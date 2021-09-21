package com.sthomas.dev.babyboom;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;

import androidx.appcompat.app.AppCompatActivity;

import com.sthomas.dev.babyboom.databinding.ActivityConnectBinding;

import org.apache.commons.validator.routines.EmailValidator;

public class ConnectActivity extends AppCompatActivity implements View.OnClickListener {

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

//            if (binding.tvEmailLogin.getText().toString().isEmpty() || binding.tvPasswordLogin.getText().toString().isEmpty()) {
//
//                binding.tvLoginError.setVisibility(View.VISIBLE);
//                binding.tvLoginError.setText("Tous les champs sont requis");
//            } else if (!validator.isValid(binding.tvEmailLogin.getText().toString())) {
//
//                binding.tvLoginError.setVisibility(View.VISIBLE);
//                binding.tvLoginError.setText("Email erroné");
//            } else {
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