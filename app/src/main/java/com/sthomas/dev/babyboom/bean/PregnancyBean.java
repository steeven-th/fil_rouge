package com.sthomas.dev.babyboom.bean;

import java.time.LocalDate;

public class PregnancyBean {

    LocalDate dateFertilization;
    LocalDate dateDelivery;
    Boolean sharePregnancy;

    public PregnancyBean(CharSequence dateFertilization, Boolean sharePregnancy) {
        this.dateFertilization = LocalDate.parse(dateFertilization);
        this.dateDelivery = this.dateFertilization.plusDays(280);
        this.sharePregnancy = sharePregnancy;
    }

    public LocalDate getDateFertilization() {
        return dateFertilization;
    }

    public void setDateFertilization(LocalDate dateFertilization) {
        this.dateFertilization = dateFertilization;
    }

    public LocalDate getDateDelivery() {
        return dateDelivery;
    }

    public void setDateDelivery(LocalDate dateDelivery) {
        this.dateDelivery = dateDelivery;
    }

    public Boolean getSharePregnancy() {
        return sharePregnancy;
    }

    public void setSharePregnancy(Boolean sharePregnancy) {
        this.sharePregnancy = sharePregnancy;
    }
}

/*----------------------*/
// TESTS EFFECTUES
/*----------------------*/

/*----------------------*/
//        dateFertilization.set(Calendar.YEAR, 2021);
//        dateFertilization.set(Calendar.MONTH, 02);
//        dateFertilization.set(Calendar.DAY_OF_MONTH, 25);
//
//        dateDelivery.setTime(dateFertilization.getTime());
//
//        System.out.println("La date est " + dateFertilization.getTime());
//        dateDelivery.add(Calendar.DAY_OF_MONTH, 280);
//        System.out.println("La nouvelle date est" + dateFertilization.getTime());
//
//        SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");
//
//        CharSequence dateBefore = sdf.format(dateFertilization.getTime());
//        CharSequence dateAfter = sdf.format(dateDelivery.getTime());
//
//        LocalDate dateTest = LocalDate.of(2021, 02, 25);
//
//        long noOfDays = ChronoUnit.DAYS.between(LocalDate.parse(dateBefore), LocalDate.parse(dateAfter));
//        System.out.println(noOfDays);
/*----------------------*/
