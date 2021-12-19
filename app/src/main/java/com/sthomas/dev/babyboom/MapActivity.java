package com.sthomas.dev.babyboom;

import android.Manifest;
import android.content.pm.PackageManager;
import android.location.Location;
import android.os.Bundle;
import android.text.method.LinkMovementMethod;
import android.view.View;

import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;

import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.Marker;
import com.google.android.gms.maps.model.MarkerOptions;
import com.sthomas.dev.babyboom.bean.PoiBean;
import com.sthomas.dev.babyboom.bean.PoiDetailBean;
import com.sthomas.dev.babyboom.bean.ResultDetailPoiBean;
import com.sthomas.dev.babyboom.databinding.ActivityMapBinding;
import com.sthomas.dev.babyboom.utils.JsonUtils;

public class MapActivity extends CommunActivity implements OnMapReadyCallback, View.OnClickListener, GoogleMap.OnMarkerClickListener {

    private GoogleMap mMap;
    private ActivityMapBinding binding;
    private PoiBean poiResult;
    private LatLng POI;
    private PoiDetailBean markerClick;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        binding = ActivityMapBinding.inflate(getLayoutInflater());
        setContentView(binding.getRoot());

        /*----------------------*/
        // Appel de la ToolBar depuis CommunActivity
        /*----------------------*/
        menuTopAppBarNavIcon(binding.topAppBar);

        menuTopAppBar(binding.topAppBar);

        /*----------------------*/
        // Appel de la BottomBar depuis CommunActivity
        /*----------------------*/
        menuBottomAppBarNavIcon(binding.bottomAppBar);

        menuBottomAppBar(binding.bottomAppBar, binding.floatingActionButton);

        //clic boutons
        binding.btMaternity.setOnClickListener(this);
        binding.btNursery.setOnClickListener(this);

        // Obtain the SupportMapFragment and get notified when the map is ready to be used.
        SupportMapFragment mapFragment = (SupportMapFragment) getSupportFragmentManager()
                .findFragmentById(R.id.map);
        mapFragment.getMapAsync(this);
    }

    @Override
    public void onClick(View view) {

        if (view == binding.btMaternity) {
            searchPoi("maternité");
        } else if (view == binding.btNursery) {
            searchPoi("assistante", "maternelle");
        }
    }

    /**
     * Manipulates the map once available.
     * This callback is triggered when the map is ready to be used.
     * This is where we can add markers or lines, add listeners or move the camera. In this case,
     * we just add a marker near Sydney, Australia.
     * If Google Play services is not installed on the device, the user will be prompted to install
     * it inside the SupportMapFragment. This method will only be triggered once the user has
     * installed Google Play services and returned to the app.
     */

    @Override
    public void onMapReady(GoogleMap googleMap) {
        mMap = googleMap;

        refreshScreen();

        mMap.setOnMarkerClickListener(this);
    }

    private void refreshScreen() {

        mMap.clear();

        mMap.getUiSettings().setZoomControlsEnabled(true);

        /* Position de l'utilisateur */
        //Etape 1 : Est ce qu'on a déjà la permission ?
        if (ContextCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION) == PackageManager.PERMISSION_GRANTED) {
            //On a la permission
            userPosition();
        } else {
            //Etape 2 : On affiche la fenêtre de demande de permission
            ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.ACCESS_FINE_LOCATION}, 0);
        }

        if (poiResult != null) {

            for (int i = 0; i < poiResult.getResults().size(); i++) {
                POI = new LatLng(poiResult.getResults().get(i).getGeometry().getLocation().getLat(), poiResult.getResults().get(i).getGeometry().getLocation().getLng());

                MarkerOptions markerPoi = new MarkerOptions();

                mMap.addMarker(markerPoi.position(POI).title(poiResult.getResults().get(i).getName())).setTag(poiResult.getResults().get(i).getPlace_id());
            }
        }
    }

    private void userPosition() {

        try {

            //Récupérer la localisation à l'aide getLastKnowLocation
            Location location = getLastKnownLocation();

            //Si on a pas de localisation ->erreur
            if (location == null) {
                throw new Exception("Pas de localisation");
            }

            // Ajout d'un marqueur sur la position de l'utilisateur et déplacement de la caméra
            LatLng userPosition = new LatLng(location.getLatitude(), location.getLongitude());
            mMap.addMarker(new MarkerOptions().position(userPosition).title("User Position"));
            mMap.animateCamera(CameraUpdateFactory.newLatLngZoom(userPosition, 11f));

        } catch (Exception e) {
            e.printStackTrace();//Ca affiche dans la console le detail de l'erreur
            //un problème j'affiche mon erreur à l'utilisateur
            binding.tvMapError.setText(e.getMessage());
        }
    }

    @Override
    public void onRequestPermissionsResult(int requestCode, String[] permissions, int[] gr) {

        super.onRequestPermissionsResult(requestCode, permissions, gr);

        //On verifie la réponse
        if (ContextCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION) == PackageManager.PERMISSION_GRANTED) {
            //ON a la permission
            userPosition();
        } else {
            ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.ACCESS_FINE_LOCATION}, 0);
        }
    }

    public void searchPoi(String keyword) {
        this.searchPoi(keyword, "");
    }


    /*----------------------*/
    // Recherche des POI à proximité de l'utilisateur
    /*----------------------*/

    public void searchPoi(String keyword1, String keyword2) {

        //Récupération de la position de l'utilisateur
        Location location = getLastKnownLocation();

        //Nouveau Thread
        new Thread() {
            @Override
            public void run() {
                try {

                    GoogleKeys googleKeys = new GoogleKeys();

                    //Récupération de tous les POI demandés dans un rayon de 20km
                    poiResult = JsonUtils.loadPoi(
                            "https://maps.googleapis.com/maps/api/place/textsearch/json?" +
                                    "query=" + //Type de recherche : par phrase ou texte
                                    keyword1 + //Premier mot de la recherche
                                    "%20" + //Séparateur de mots clés
                                    keyword2 + //Deuxième mot de la recherche
                                    "&location=" +
                                    location.getLatitude() + //Latitude
                                    "%2C" + //Séparateur
                                    location.getLongitude() + //Longitude
                                    "&radius=20000" + //Périmètre de recherche en mètres
                                    "&key=" +
                                    googleKeys.googlePointerKey//Clé de l'API
                    );

                    //Appel de refreshScreen pour afficher les POI sur la carte
                    runOnUiThread(new Runnable() {
                        @Override
                        public void run() {
                            refreshScreen();
                        }
                    });

                } catch (Exception e) {
                    e.printStackTrace();

                    runOnUiThread(new Runnable() {
                        @Override
                        public void run() {
                            binding.tvMapError.setText(e.getMessage());
                        }
                    });
                }
            }
        }.start();
    }

    @Override
    public boolean onMarkerClick(Marker marker) {

        detailsPoi((String) marker.getTag());

        return false;
    }

    public void detailsPoi(String placeId) {

        //Nouveau Thread
        new Thread() {
            @Override
            public void run() {
                try {

                    GoogleKeys googleKeys = new GoogleKeys();

                    //Récupération des infos du POI sélectionné
                    markerClick = JsonUtils.loadDetailsPoi(
                            "https://maps.googleapis.com/maps/api/place/details/json?" +
                                    "place_id=" + //Type de recherche : par ID
                                    placeId + //Place ID récupérer dans le getTag du marker
                                    "&key=" +
                                    googleKeys.googlePointerKey//Clé de l'API
                    );

                    //Appel de refreshScreen pour afficher les détails du POI
                    runOnUiThread(new Runnable() {
                        @Override
                        public void run() {

                            ResultDetailPoiBean myMarker = markerClick.getResult();

                            if (myMarker != null) {

                                if (myMarker.getName() != null) {
                                    binding.tvPoiInfos1.setText(myMarker.getName());
                                } else {
                                    binding.tvPoiInfos1.setText("aucun nom");
                                }

                                if (myMarker.getFormatted_address() != null) {
                                    binding.tvPoiInfos2.setText(myMarker.getFormatted_address());
                                } else {
                                    binding.tvPoiInfos2.setText("aucune adresse");
                                }

                                if (myMarker.getFormatted_phone_number() != null) {
                                    binding.tvPoiInfos3.setText(myMarker.getFormatted_phone_number());
                                } else {
                                    binding.tvPoiInfos3.setText("aucun numéro");
                                }

                                if (myMarker.getRating() != null) {
                                    binding.tvPoiInfos4.setText(myMarker.getRating());
                                } else {
                                    binding.tvPoiInfos4.setText("aucunes notes");
                                }

                                if (myMarker.getUrl() != null) {
                                    binding.tvPoiInfos5.setText(myMarker.getUrl());
                                } else {
                                    binding.tvPoiInfos5.setText("aucune URL");
                                    binding.tvPoiInfos5.setMovementMethod(LinkMovementMethod.getInstance());
                                }
                            }

                        }
                    });

                } catch (Exception e) {
                    e.printStackTrace();

                    runOnUiThread(new Runnable() {
                        @Override
                        public void run() {
                            binding.tvMapError.setText(e.getMessage());
                        }
                    });
                }
            }
        }.start();
    }
}