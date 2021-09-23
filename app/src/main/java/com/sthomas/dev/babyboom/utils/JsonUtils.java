package com.sthomas.dev.babyboom.utils;

import com.google.gson.Gson;
import com.sthomas.dev.babyboom.bean.PoiBean;
import com.sthomas.dev.babyboom.bean.PoiDetailBean;

public class JsonUtils {

    public static PoiBean loadPoi(String monUrl) throws Exception {

        if (monUrl != null) {

            //Requete avec OKHttpUtils
            String json = OkHttpUtils.sendGetOkHttpRequest(monUrl);

            System.out.println(json);

            //Parser le JSON avec le bon bean et GSON
            return new Gson().fromJson(json, PoiBean.class);
        } else {
            throw new Exception("Pas de localisation");
        }
    }

    public static PoiDetailBean loadDetailsPoi(String monUrl) throws Exception {

        if (monUrl != null) {

            //Requete avec OKHttpUtils
            String json = OkHttpUtils.sendGetOkHttpRequest(monUrl);

            System.out.println(json);

            //Parser le JSON avec le bon bean et GSON
            return new Gson().fromJson(json, PoiDetailBean.class);
        } else {
            throw new Exception("Pas de localisation");
        }
    }
}
