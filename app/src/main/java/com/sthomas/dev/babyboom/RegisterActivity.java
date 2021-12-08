package com.sthomas.dev.babyboom;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;

import com.sthomas.dev.babyboom.bean.ParentsBean;
import com.sthomas.dev.babyboom.databinding.ActivityRegisterBinding;
import com.sthomas.dev.babyboom.utils.CommonUtils;
import com.sthomas.dev.babyboom.utils.OkHttpUtils;

import java.security.NoSuchAlgorithmException;

public class RegisterActivity extends CommunActivity implements View.OnClickListener {

    //Déclaration du binding contenant les références des composants
    private ActivityRegisterBinding binding;

    private String login, password, passwordRepeat;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        //Chargement de l'interface graphique
        binding = ActivityRegisterBinding.inflate(getLayoutInflater());

        setContentView(binding.getRoot());

        //clic boutons
        binding.btRegister.setOnClickListener(this);
        binding.tvLoginPage.setOnClickListener(this);
    }

    @Override
    public void onClick(View view) {

        // Si clic sur le bouton s'enregistrer
        if (view == binding.btRegister) {

            /*----------------------*/
            // Récupération des données envoyées dans des variables
            /*----------------------*/

            login = binding.tvEmailCreateLogin.getText().toString();
            password = binding.tvPasswordCreateLogin.getText().toString();
            passwordRepeat = binding.tvPasswordConfirmationCreateLogin.getText().toString();

            /*----------------------*/
            // Vérification de l'enregistrement
            /*----------------------*/

            //On vérifie que l'email et le mot de passe ne soient pas vides
            if (login.isEmpty() || password.isEmpty() || passwordRepeat.isEmpty()) {

                binding.tvLoginError.setVisibility(View.VISIBLE);
                binding.tvLoginError.setText("Tous les champs sont requis");

            } else if (!CommonUtils.emailValidator.isValid(login)) { //Si l'email n'est pas dans le bon format, on affiche une erreur

                binding.tvLoginError.setVisibility(View.VISIBLE);
                binding.tvLoginError.setText("Email erroné");

            } else if (!password.equals(passwordRepeat)) { //Si les mdp ne sont pas identiques, on affiche une erreur

                binding.tvLoginError.setVisibility(View.VISIBLE);
                binding.tvLoginError.setText("Les mots de passes doivent être identiques");

            } else { //Si tout va bien, on contact le serveur qui va contrôler les données avec la BDD

                try {

                    //Hash du mot de passe utilisateur
                    //String hashPassword = HashPassword(binding.tvPasswordCreateLogin.getText().toString());

                    //ParentsBean parentsAEnvoyer = new ParentsBean(binding.tvEmailCreateLogin.getText().toString(), hashPassword);
                    ParentsBean parentsAEnvoyer = new ParentsBean(binding.tvEmailCreateLogin.getText().toString(), binding.tvPasswordCreateLogin.getText().toString());

                    //On converti l'utilisateur en JSON
                    String jsonAEnvoyer = CommonUtils.gson.toJson(parentsAEnvoyer);

                    //Nouveau Thread
                    new Thread() {
                        @Override
                        public void run() {
                            try {

                                //On récupère le JSON renvoyé
                                String jsonRecu = OkHttpUtils.sendPostOkHttpRequestLogin(URL + "/saveParents", jsonAEnvoyer);

                                //On vérifie si on reçoit TRUE ou FALSE
                                if (jsonRecu.equals("true")) {
                                    Intent intent = new Intent(RegisterActivity.this, ConnectActivity.class);
                                    startActivity(intent);
                                } else {
                                    binding.tvLoginError.setVisibility(View.VISIBLE);
                                    binding.tvLoginError.setText("Cet utilisateur existe déjà");
                                }
                            } catch (Exception e) {
                                e.printStackTrace();
                            }
                        }
                    }.start();

                } catch (Exception e) {
                    e.printStackTrace();
                    binding.tvLoginError.setVisibility(View.VISIBLE);
                    binding.tvLoginError.setText("Un problème est survenu");
//                    catch (NoSuchAlgorithmException e) {
//                        e.printStackTrace();
//                        binding.tvLoginError.setVisibility(View.VISIBLE);
//                        binding.tvLoginError.setText("Un problème est survenu");
                }
            }
        } else if (view == binding.btAccessShare) {
            System.out.println("clic accès partage");
        } else if (view == binding.tvLoginPage) {
            Intent intent = new Intent(this, ConnectActivity.class);
            startActivity(intent);
        }
    }
}