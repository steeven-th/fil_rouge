package com.sthomas.dev.babyboom;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;

import com.sthomas.dev.babyboom.bean.ParentsBean;
import com.sthomas.dev.babyboom.databinding.ActivityConnectBinding;
import com.sthomas.dev.babyboom.utils.CommonUtils;
import com.sthomas.dev.babyboom.utils.OkHttpUtils;

import java.security.NoSuchAlgorithmException;

public class ConnectActivity extends CommunActivity implements View.OnClickListener {

    //Déclaration du binding contenant les références des composants
    private ActivityConnectBinding binding;

    //Attributs
    //EmailValidator validator = EmailValidator.getInstance();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        //Chargement de l'interface graphique
        binding = ActivityConnectBinding.inflate(getLayoutInflater());

        setContentView(binding.getRoot());

        //clic boutons
        binding.btLogin.setOnClickListener(this);
        binding.btAccessShare.setOnClickListener(this);
        binding.tvCreateAccountPage.setOnClickListener(this);
    }

    @Override
    public void onClick(View view) {

        // Si clic sur le bouton connexion, on charge la page principale MainActivity
        if (view == binding.btLogin) {

            System.out.println("clic connexion");

            /*----------------------*/
            // Vérification de connection
            /*----------------------*/

            //On vérifie que l'email et le mot de passe ne soient pas vides
            if (binding.tvEmailLogin.getText().toString().isEmpty() || binding.tvPasswordLogin.getText().toString().isEmpty()) {

                binding.tvLoginError.setVisibility(View.VISIBLE);
                binding.tvLoginError.setText("Tous les champs sont requis");

            } else if (!CommonUtils.emailValidator.isValid(binding.tvEmailLogin.getText().toString())) { //Si l'email n'est pas dans le bon format, on affiche une erreur

                binding.tvLoginError.setVisibility(View.VISIBLE);
                binding.tvLoginError.setText("Email erroné");

            } else { //Si tout va bien, on contact le serveur qui va contrôler les données avec la BDD

                //Nouveau Thread
                new Thread() {
                    @Override
                    public void run() {
                        try {

                            //Hash du mot de passe utilisateur
                            String hashPassword = HashPassword(binding.tvPasswordLogin.getText().toString());

                            ParentsBean parentsAEnvoyer = new ParentsBean(binding.tvEmailLogin.getText().toString(), hashPassword);

                            //On converti l'utilisateur en JSON
                            String jsonAEnvoyer = CommonUtils.gson.toJson(parentsAEnvoyer);

                            //On récupère le JSON renvoyé
                            String jsonRecu = OkHttpUtils.sendPostOkHttpRequestLogin(URL + "/loginParents", jsonAEnvoyer);

                            System.out.println("JSON RECU => " + jsonRecu);

                            //On vérifie si on reçoit TRUE ou FALSE
                            if (jsonRecu.equals("true")) {
                                Intent intent = new Intent(ConnectActivity.this, MainActivity.class);
                                startActivity(intent);
                            } else {

                                runOnUiThread(new Runnable() {
                                    @Override
                                    public void run() {

                                        binding.tvLoginError.setVisibility(View.VISIBLE);
                                        binding.tvLoginError.setText("Problème avec le login ou le mdp");
                                    }
                                });
                            }
                        } catch (Exception e) {
                            e.printStackTrace();
                        }
                    }
                }.start();
            }
        } else if (view == binding.btAccessShare) {
            System.out.println("clic accès partage");
        } else if (view == binding.tvCreateAccountPage) {
            Intent intent = new Intent(this, RegisterActivity.class);
            startActivity(intent);
        }
    }

    @Override
    public void onPointerCaptureChanged(boolean hasCapture) {

    }
}