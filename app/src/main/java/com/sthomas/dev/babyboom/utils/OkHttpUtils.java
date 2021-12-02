package com.sthomas.dev.babyboom.utils;

import android.util.Log;

import java.util.concurrent.TimeUnit;

import okhttp3.MediaType;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.RequestBody;
import okhttp3.Response;

public class OkHttpUtils {

    private static final OkHttpClient client = new OkHttpClient.Builder()
            .connectTimeout(3, TimeUnit.SECONDS)
            .build();

    public static String sendGetOkHttpRequest(String url) throws Exception {
        Log.w("tag", "url : " + url);

        //Création de la requete
        Request request = new Request.Builder().url(url).method("GET", null).build();

        //Execution de la requête
        Response response = client.newCall(request).execute();

        //Analyse du code retour
        if (response.code() < 200 || response.code() >= 300) {
            throw new Exception("Réponse du serveur incorrect : " + response.code());
        } else {
            //Résultat de la requete.
            //ATTENTION .string() ne peut être appelée qu’une seule fois.
            return response.body().string();
        }
    }

    public static String sendPostOkHttpRequestLogin(String url, String user) throws Exception {
        Log.w("tag", "url : " + url);

        OkHttpClient client = new OkHttpClient();
        MediaType JSON = MediaType.parse("application/json; charset=utf-8");

        //Corps de la requête
        RequestBody body = RequestBody.create(JSON, user);

        //Création de la requete
        Request request = new Request.Builder().url(url).post(body).build();

        System.out.println("OKHTTP REQUEST : " + request);

        //Execution de la requête
        Response response = client.newCall(request).execute();

        System.out.println("OKHTTP RESPONSE : " + response);

        //Analyse du code retour
        if (response.code() < 200 || response.code() >= 300) {
            throw new Exception("Réponse du serveur incorrect : " + response.code());
        } else {
            //Résultat de la requete.
            //ATTENTION .string() ne peut être appelée qu’une seule fois.
            return response.body().string();
        }
    }
}