package com.sthomas.dev.babyboom.bean;

import java.util.ArrayList;

public class PoiBean {

    private ArrayList<ResultBean> results;

    public PoiBean(ArrayList<ResultBean> results) {
        this.results = results;
    }


    /*----------------------*/
    // Getter & Setter
    /*----------------------*/

    public ArrayList<ResultBean> getResults() {
        return results;
    }
}
