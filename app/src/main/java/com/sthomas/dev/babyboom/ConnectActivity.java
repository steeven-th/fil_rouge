package com.sthomas.dev.babyboom;

import android.app.ActionBar;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.view.WindowManager;

import androidx.appcompat.app.AppCompatActivity;

import com.sthomas.dev.babyboom.databinding.ActivityConnectBinding;

import org.apache.commons.validator.routines.EmailValidator;

public class ConnectActivity extends CommunActivity implements View.OnClickListener {

    //Déclaration du binding contenant les références des composants
    private ActivityConnectBinding binding;

    //Attributs
    EmailValidator validator = EmailValidator.getInstance();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        //Chargement de l'interface graphique
        binding = ActivityConnectBinding.inflate(getLayoutInflater());

        setContentView(binding.getRoot());

        //clic boutons
        binding.btLogin.setOnClickListener(this);
        binding.btAccessShare.setOnClickListener(this);
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
//            if (binding.tvEmailLogin.getText().toString().isEmpty() || binding.tvPasswordLogin.getText().toString().isEmpty()) {
//
//                binding.tvLoginError.setVisibility(View.VISIBLE);
//                binding.tvLoginError.setText("Tous les champs sont requis");
//            } else if (!validator.isValid(binding.tvEmailLogin.getText().toString())) { //Si l'email n'est pas dans le bon format, on affiche une erreur
//
//                binding.tvLoginError.setVisibility(View.VISIBLE);
//                binding.tvLoginError.setText("Email erroné");
//            } else { //Si tout va bien, on envoi sur la page MainActivity
//                Intent intent = new Intent(this, MainActivity.class);
//                startActivity(intent);
//            }

            Intent intent = new Intent(this, MainActivity.class);
            startActivity(intent);

        } else if (view == binding.btAccessShare) {
            System.out.println("clic accès partage");
        }
    }

    @Override
    public void onPointerCaptureChanged(boolean hasCapture) {

    }


}