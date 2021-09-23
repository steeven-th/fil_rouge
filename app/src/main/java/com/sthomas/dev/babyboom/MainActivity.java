package com.sthomas.dev.babyboom;

import android.os.Bundle;
import android.view.View;

import androidx.annotation.Nullable;

import com.sthomas.dev.babyboom.bean.PregnancyBean;
import com.sthomas.dev.babyboom.databinding.ActivityMainBinding;

import java.time.LocalDate;
import java.time.temporal.ChronoUnit;

public class MainActivity extends CommunActivity implements View.OnClickListener {

    //Déclaration du binding contenant les références des composants
    private ActivityMainBinding binding;

    //Attributs
    PregnancyBean pregnancyBean = new PregnancyBean("2021-03-25", false);

    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        //Chargement de l'interface graphique
        binding = ActivityMainBinding.inflate(getLayoutInflater());

        setContentView(binding.getRoot());

        /*----------------------*/
        // Appel de la ToolBar depuis CommunActivity
        /*----------------------*/
        menuTopAppBarNavIcon(binding.topAppBar);

        menuTopAppBar(binding.topAppBar);

        /*----------------------*/
        // Appel de la BottomBar depuis CommunActivity
        /*----------------------*/
        menuBottomAppBarNavIcon(binding.bottomAppBar);

        menuBottomAppBar(binding.bottomAppBar, binding.floatingActionButton);

        //clic boutons
        binding.btTipOfTheWeek.setOnClickListener(this);
        binding.btBabyInfos.setOnClickListener(this);

        System.out.println(pregnancyBean.getDateFertilization());
        System.out.println(pregnancyBean.getDateDelivery());

        //Affichage du nombre de jours restants avant accouchement dans la progressBar
        //Maj avancement de la progressBar
        remainingPregnancy();

    }

    @Override
    public void onClick(View view) {

//        if (view == binding.floatingActionButton) {
//            Intent intent_home = new Intent(MainActivity.this, ConnectActivity.class);
//            startActivity(intent_home);
//        }
    }


    public void setProgressTo(Integer progress, Integer remainingDays) {

        binding.tvProgress.setText(remainingDays.toString() + "\nsemaines\naménorhées");
        binding.circularDeterminativePb.setProgress(progress);
    }

    public void remainingPregnancy() {

        LocalDate dateNow = LocalDate.now();
        long nbDaysPassed = ChronoUnit.DAYS.between(pregnancyBean.getDateFertilization(), dateNow);
        long nbDaysTotal = ChronoUnit.DAYS.between(pregnancyBean.getDateFertilization(), pregnancyBean.getDateDelivery());
        long nbWeeksPassed = ChronoUnit.WEEKS.between(pregnancyBean.getDateFertilization(), dateNow);

        setProgressTo((int) ((nbDaysPassed * 100) / nbDaysTotal), (int) nbWeeksPassed);
    }
}
