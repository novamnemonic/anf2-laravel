<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\news_secciones;

class SeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $seccion3 = new news_secciones();
        $seccion3->nombre ='NACIONAL';
        $seccion3->nombre_corto ='Soc';
        $seccion3->padre = 0;
        $seccion3->slug = 'sociedad';
        $seccion3->peso = 1;
        $seccion3->activo = 1;
        $seccion3->save();


        $seccion1 = new news_secciones();
        $seccion1->nombre ='POLÍTICA';
        $seccion1->nombre_corto ='Pol';
        $seccion1->padre = 1;
        $seccion1->slug = 'politica';
        $seccion1->peso = 1;
        $seccion1->activo = 1;
        $seccion1->save();

        $seccion2 = new news_secciones();
        $seccion2->nombre ='DEMOCRACIA';
        $seccion2->nombre_corto ='Dem';
        $seccion2->padre = 1;
        $seccion2->slug = 'democracia';
        $seccion2->peso = 2;
        $seccion2->activo = 1;
        $seccion2->save();

        $seccion3 = new news_secciones();
        $seccion3->nombre ='SOCIEDAD';
        $seccion3->nombre_corto ='Soc';
        $seccion3->padre = 1;
        $seccion3->slug = 'sociedad';
        $seccion3->peso = 3;
        $seccion3->activo = 1;
        $seccion3->save();

        $seccion4 = new news_secciones();
        $seccion4->nombre ='CIUDADES';
        $seccion4->nombre_corto ='ciu';
        $seccion4->padre = 1;
        $seccion4->slug = 'siudades';
        $seccion4->peso = 4;
        $seccion4->activo = 1;
        $seccion4->save();

        $seccion5 = new news_secciones();
        $seccion5->nombre ='JUSTICIA';
        $seccion5->nombre_corto ='jus';
        $seccion5->padre = 1;
        $seccion5->slug = 'justicia';
        $seccion5->peso = 5;
        $seccion5->activo = 1;
        $seccion5->save();

        $seccion6 = new news_secciones();
        $seccion6->nombre ='ECONOMÍA';
        $seccion6->nombre_corto ='eco';
        $seccion6->padre = 1;
        $seccion6->slug = 'economia';
        $seccion6->peso = 6;
        $seccion6->activo = 1;
        $seccion6->save();

        $seccion7 = new news_secciones();
        $seccion7->nombre ='SEGURIDAD';
        $seccion7->nombre_corto ='Seg';
        $seccion7->padre = 1;
        $seccion7->slug = 'seguridad';
        $seccion7->peso = 7;
        $seccion7->activo = 1;
        $seccion7->save();

        $seccion8 = new news_secciones();
        $seccion8->nombre ='DESARROLLO SOSTENIBLE';
        $seccion8->nombre_corto ='DS';
        $seccion8->padre = 1;
        $seccion8->slug = 'desarrollo-sostenible';
        $seccion8->peso = 8;
        $seccion8->activo = 1;
        $seccion8->save();

        $seccion9 = new news_secciones();
        $seccion9->nombre ='SOCIAL';
        $seccion9->nombre_corto ='Soc';
        $seccion9->padre = 0;
        $seccion9->slug = 'sociedad';
        $seccion9->peso = 0;
        $seccion9->activo = 1;
        $seccion9->save();

        $seccion10 = new news_secciones();
        $seccion10->nombre ='DERECHOS HUMANOS';
        $seccion10->nombre_corto ='DDHH';
        $seccion10->padre = 10;
        $seccion10->slug = 'derechos-humanos';
        $seccion10->peso = 1;
        $seccion10->activo = 1;
        $seccion10->save();

        $seccion10 = new news_secciones();
        $seccion10->nombre ='PUEBLOS INDIGENAS';
        $seccion10->nombre_corto ='P.I.';
        $seccion10->padre = 10;
        $seccion10->slug = 'pueblos-indigenas';
        $seccion10->peso = 2;
        $seccion10->activo = 1;
        $seccion10->save();

        $seccion11 = new news_secciones();
        $seccion11->nombre ='MUJERES, INFANCIA, ADULTOS MAYORES';
        $seccion11->nombre_corto ='M.I.A.';
        $seccion11->padre = 10;
        $seccion11->slug = 'mujeres-infancia-adultos-mayores';
        $seccion11->peso = 3;
        $seccion11->activo = 1;
        $seccion11->save();

        $seccion12 = new news_secciones();
        $seccion12->nombre ='MIGRANTES';
        $seccion12->nombre_corto ='mig';
        $seccion12->padre = 10;
        $seccion12->slug = 'migrantes';
        $seccion12->peso = 4;
        $seccion12->activo = 1;
        $seccion12->save();

        $seccion13 = new news_secciones();
        $seccion13->nombre ='RELIGIÓN Y ESPIRITUALIDAD';
        $seccion13->nombre_corto ='rel';
        $seccion13->padre = 10;
        $seccion13->slug = 'religión-y-espiritualidad';
        $seccion13->peso = 5;
        $seccion13->activo = 1;
        $seccion13->save();

        $seccion14 = new news_secciones();
        $seccion14->nombre ='CULTURAS';
        $seccion14->nombre_corto ='cult';
        $seccion14->padre = 10;
        $seccion14->slug = 'culturas';
        $seccion14->peso = 6;
        $seccion14->activo = 1;
        $seccion14->save();

        $seccion15 = new news_secciones();
        $seccion15->nombre ='DEPORTES';
        $seccion15->nombre_corto ='dep';
        $seccion15->padre = 10;
        $seccion15->slug = 'deportes';
        $seccion15->peso = 7;
        $seccion15->activo = 1;
        $seccion15->save();

        $seccion16 = new news_secciones();
        $seccion16->nombre ='RECURSOS';
        $seccion16->nombre_corto ='rec';
        $seccion16->padre = 0;
        $seccion16->slug = 'recursos';
        $seccion16->peso = 3;
        $seccion16->activo = 1;
        $seccion16->save();

        $seccion17 = new news_secciones();
        $seccion17->nombre ='ALIMENTOS';
        $seccion17->nombre_corto ='ali';
        $seccion17->padre = 18;
        $seccion17->slug = 'alimentos';
        $seccion17->peso = 1;
        $seccion17->activo = 1;
        $seccion17->save();

        $seccion18 = new news_secciones();
        $seccion18->nombre ='CUIDADO DE LA CASA COMÚN';
        $seccion18->nombre_corto ='casa saludable';
        $seccion18->padre = 18;
        $seccion18->slug = 'cuidado-de-la-casa-comun';
        $seccion18->peso = 2;
        $seccion18->activo = 1;
        $seccion18->save();

        $seccion19 = new news_secciones();
        $seccion19->nombre ='SALUD';
        $seccion19->nombre_corto ='salud';
        $seccion19->padre = 18;
        $seccion19->slug = 'salud';
        $seccion19->peso = 3;
        $seccion19->activo = 1;
        $seccion19->save();


    }
}
