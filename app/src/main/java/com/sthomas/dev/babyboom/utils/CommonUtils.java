package com.sthomas.dev.babyboom.utils;

import androidx.appcompat.app.AppCompatActivity;

import com.google.gson.Gson;

import org.apache.commons.validator.routines.EmailValidator;

import java.nio.charset.StandardCharsets;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;

public class CommonUtils extends AppCompatActivity {

    protected static final Gson gson = new Gson();

    protected static final EmailValidator emailValidator = EmailValidator.getInstance();

    /*----------------------*/
    // Chiffrement password
    /*----------------------*/

    protected String HashPassword(String password) throws NoSuchAlgorithmException {

        MessageDigest msg = MessageDigest.getInstance("SHA-256");
        byte[] hash = msg.digest(password.getBytes(StandardCharsets.UTF_8));

        // convertir bytes en hexadécimal
        StringBuilder s = new StringBuilder();
        for (byte b : hash) {
            s.append(Integer.toString((b & 0xff) + 0x100, 16).substring(1));
        }

        System.out.println(s.toString());

        return s.toString();
    }
}
