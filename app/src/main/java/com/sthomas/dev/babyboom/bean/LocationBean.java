package com.sthomas.dev.babyboom.bean;

public class LocationBean {

    private double lat;
    private double lng;

    public LocationBean(double lat, double lng) {
        this.lat = lat;
        this.lng = lng;
    }


    /*----------------------*/
    // Getter & Setter
    /*----------------------*/

    public double getLat() {
        return lat;
    }

    public double getLng() {
        return lng;
    }
}
