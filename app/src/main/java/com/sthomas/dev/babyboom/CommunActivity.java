package com.sthomas.dev.babyboom;

import android.Manifest;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.location.Location;
import android.location.LocationManager;
import android.view.View;
import android.view.WindowManager;

import androidx.core.content.ContextCompat;

import com.google.android.material.appbar.MaterialToolbar;
import com.google.android.material.bottomappbar.BottomAppBar;
import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.sthomas.dev.babyboom.utils.CommonUtils;

public class CommunActivity extends CommonUtils {

    public String URL = "http://192.168.1.238:8080";

    @Override
    protected void onResume() {
        super.onResume();

        /*----------------------*/
        // Masquage de la ToolBar par défaut
        /*----------------------*/
        getSupportActionBar().hide();
        getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN, WindowManager.LayoutParams.FLAG_FULLSCREEN);
    }

    /*----------------------*/
    // Fonction d'appel de l'icon de navigation du menu Top ToolBar
    /*----------------------*/
    protected void menuTopAppBarNavIcon(MaterialToolbar materialToolbar) {
        materialToolbar.setNavigationOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                /*----------------------*/
                // UTILISER CET ESPACE POUR UTILISER LE BOUTON HOME DANS LA TOP BAR SI BESOIN
                /*----------------------*/
            }
        });
    }

    /*----------------------*/
    // Fonction d'appel des icons du menu Top ToolBar
    /*----------------------*/
    protected void menuTopAppBar(MaterialToolbar materialToolbar) {

        materialToolbar.setOnMenuItemClickListener(item -> {
            /*----------------------*/
            // UTILISER CET ESPACE POUR IMPLEMENTER UN MENU DANS LA TOP BAR
            /*----------------------*/
            return false;
        });
    }

    /*----------------------*/
    // Fonction d'appel de l'icon de navigation du menu Bottom
    /*----------------------*/
    protected void menuBottomAppBarNavIcon(BottomAppBar bottomAppBar) {
        bottomAppBar.setNavigationOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                /*----------------------*/
                // UTILISER CET ESPACE POUR UTILISER LE BOUTON HOME DANS LA TOP BAR SI BESOIN
                /*----------------------*/
            }
        });
    }

    /*----------------------*/
    // Fonction d'appel des icons du menu Bottom
    /*----------------------*/

    protected void menuBottomAppBar(BottomAppBar bottomAppBar, FloatingActionButton floatingActionButton) {

        floatingActionButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent_home = new Intent(CommunActivity.this, ConnectActivity.class);
                startActivity(intent_home);
            }
        });

        bottomAppBar.setOnMenuItemClickListener(item -> {

            switch (item.getItemId()) {
                case R.id.page_home:
                    Intent intent_home = new Intent(this, MainActivity.class);
                    startActivity(intent_home);
                    break;
                case R.id.page_hospital:
                    Intent intent_hospital = new Intent(this, MapActivity.class);
                    startActivity(intent_hospital);
                    break;
                case R.id.page_calendar:

//                    Intent intent_calendar = new Intent(this, MainActivity.class);
//                    startActivity(intent_calendar);
                    break;
                case R.id.page_checklist:
//                    Intent intent_checklist = new Intent(this, MainActivity.class);
//                    startActivity(intent_checklist);
                    break;
                case R.id.page_deal:
//                    Intent intent_deal = new Intent(this, MainActivity.class);
//                    startActivity(intent_deal);
                    break;
                case R.id.page_share_people:
//                    Intent intent_share_people = new Intent(this, MainActivity.class);
//                    startActivity(intent_share_people);
                    break;
                default:
                    return false;
            }
            return false;
        });
    }

    /*----------------------*/
    // Gestion de la localisation de l'utilisateur
    /*----------------------*/

    protected Location getLastKnownLocation() {
        //Contrôle de la permission
        if (ContextCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION) == PackageManager.PERMISSION_DENIED) {
            return null;
        }

        LocationManager lm = (LocationManager) getSystemService(LOCATION_SERVICE);
        Location bestLocation = null;

        //on teste chaque provider(réseau, GPS...) et on garde la localisation avec la meilleurs précision
        for (String provider : lm.getProviders(true)) {
            Location l = lm.getLastKnownLocation(provider);

            if (l != null && (bestLocation == null || l.getAccuracy() < bestLocation.getAccuracy())) {
                bestLocation = l;
            }
        }

        return bestLocation;
    }
}
