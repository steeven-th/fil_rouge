package com.sthomas.dev.babyboom.utils;

import com.google.gson.Gson;

import org.apache.commons.validator.routines.EmailValidator;

import java.util.regex.Pattern;

public final class CommonUtils {

    /* Utilisation de Gson */
    public static final Gson gson = new Gson();

    /* Utilisation de Email Validator */
    public static final EmailValidator emailValidator = EmailValidator.getInstance();

    /* Vérification des caractères du mot de passe */
    public static final Pattern regex = Pattern.compile("^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[^A-Za-z0-9]).{8,20}$");

}
