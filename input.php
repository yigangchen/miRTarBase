<!DOCTYPE html>
<html>
    <head>
        <title>
            miRTarBase -- Input FORM
        </title>
        <meta charset = "utf8">
        <style type="text/css">
        /* General styles */
        body { margin: 0; padding: 0; font: 80%/1.5 Arial,Helvetica,sans-serif; color: #111; background-color: #FFF; }
        h2 { margin: 0px; padding: 10px; font-family: Georgia, "Times New Roman", Times, serif; font-size: 200%; font-weight: normal; color: #FFF; background-color: #CCC; border-bottom: #BBB 2px solid; }
        p#copyright { margin: 20px 10px; font-size: 90%; color: #999; }

        /* Form styles */
        div.form-container { margin: 10px; padding: 5px; background-color: #FFF; border: #EEE 1px solid; }

        p.legend { margin-bottom: 1em; }
        p.legend em { color: #C00; font-style: normal; }

        div.errors { margin: 0 0 10px 0; padding: 5px 10px; border: #FC6 1px solid; background-color: #FFC; }
        div.errors p { margin: 0; }
        div.errors p em { color: #C00; font-style: normal; font-weight: bold; }

        div.form-container form p { margin: 0; }
        div.form-container form p.note { margin-left: 170px; font-size: 90%; color: #333; }
        div.form-container form fieldset { margin: 10px 0; padding: 10px; border: #DDD 1px solid; }
        div.form-container form legend { font-weight: bold; color: #666; }
        div.form-container form fieldset div { padding: 0.25em 0; }
        div.form-container label, 
        div.form-container span.label { margin-right: 10px; padding-right: 10px; width: 200px; display: block; float: left; text-align: right; position: relative; }
        div.form-container label.error, 
        div.form-container span.error { color: #C00; }
        div.form-container label em, 
        div.form-container span.label em { position: absolute; right: 0; font-size: 120%; font-style: normal; color: #C00; }
        div.form-container input.error { border-color: #C00; background-color: #FEF; }
        div.form-container input:focus,
        div.form-container input.error:focus, 
        div.form-container textarea:focus {background-color: #FFC; border-color: #FC6; }
        div.form-container div.controlset label, 
        div.form-container div.controlset input { display: inline; float: none; }
        div.form-container div.controlset div { margin-left: 170px; }
        div.form-container div.buttonrow { margin-left: 180px; }
        </style>
       
        <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>

        <script>
        $(function (){
            $('#validated_method').change(function (){
            var $thisSelect = $("#validated_method").selectedValues();
            //alert($thisSelect);

            var $select = "";
            $.each($thisSelect, function(key, value) { 
                $select = $select + value + "//";
            });
            var $length = $select.length;
            $('#method_sel').val($select.substring(0, $length-2));
            });
        });


        $(function (){
            $('#prediction_tools').change(function (){
            var $thisSelect = $("#prediction_tools").selectedValues();
            //alert($thisSelect);

            var $select = "";
            $.each($thisSelect, function(key, value) { 
                $select = $select + value + "//";
            });
            var $length = $select.length;
            $('#tool_sel').val($select.substring(0, $length-2));
            });
        });

       
        function addWTInfo(){ 
        $("#addWT").append("<fieldset>  <legend>WT</legend>   <div class=\"controlset\">    <span class=\"label\">Support Type<em>*</em></span>    <input name=\"wt_support_type[]\" id=\"wt_support_type\" value=\"TRUE\" type=\"checkbox\" /> <label for=\"support_type\">TRUE MTI</label>     <input name=\"wt_support_type[]\" id=\"wt_support_type\" value=\"FALSE\" type=\"checkbox\" /> <label for=\"support_type\">FALSE MTI</label>  </div> <div><label for='mrna_id'>mRNA ID(RefSeq):</label><input id='mrna' name='mrna' type='text' size='80'></div><div><label for='site_name'>Site name:</label><input id='wt_site_name' name='wt_site_name[]' type='text' size='80'></div><div> <label for=\"wt_mRNASeq\">mRNA Seq (Target; 5'->3') </label>  <input id=\"wt_mRNASeq\" name=\"wt_mRNASeq[]\" type=\"text\" size=\"80\" /></div><div><label for=\"wt_mRNASeq\">mRNA Primer</label>  Forward: <input id=\"wt_mRNASeq_primer_f\" name=\"wt_mRNASeq_primer_f[]\" type=\"text\" size=\"80\" /></div><div><label><font color='#FFF'>hide</font></label>Reverse:<input id=\"wt_mRNASeq_primer_r\" name=\"wt_mRNASeq_primer_r[]\" type=\"text\" size=\"80\" /><a href='http://genome.ucsc.edu/cgi-bin/hgPcr?command=start' target='_new'>【UCSC In-Silico PCR】</a></div><div id=\"pcr\"></div></fieldset>"); 
        };

        function addMTInfo(){ 
        $("#addMT").append("<fieldset>  <legend>Mutant</legend>   <div class=\"controlset\">    <span class=\"label\">Support Type<em>*</em></span>    <input name=\"mt_support_type[]\" id=\"mt_support_type\" value=\"TRUE\" type=\"checkbox\" /> <label for=\"support_type\">TRUE MTI</label>     <input name=\"mt_support_type[]\" id=\"mt_support_type\" value=\"FALSE\" type=\"checkbox\" /> <label for=\"support_type\">FALSE MTI</label>  </div> <div><label for='mt_site_name'>Site name:</label><input id='mt_site_name' name='mt_site_name[]' type='text' size='80'></div><div> <label for=\"mt_mRNASeq\">mRNA Seq (Target; 5'->3') </label>  <input type=\"checkbox\" name=\"mt_mRNASeq_State[]\" value=\"1\">Mutated<input id=\"mt_mRNASeq\" name=\"mt_mRNASeq[]\" type=\"text\" size=\"80\" /></div><div> <label for=\"mRNASeq\">miRNA Seq (Target; 3'->5') </label>  <input type=\"checkbox\" name=\"mt_miRNASeq_State[]\" value=\"1\">Mutated<input id=\"mt_miRNASeq\" name=\"mt_miRNASeq[]\" type=\"text\" size=\"80\" /></div><div><label for=\"wt_mRNASeq\">mRNA Primer</label>  Forward: <input id=\"mt_mRNASeq_primer_f\" name=\"mt_mRNASeq_primer_f[]\" type=\"text\" size=\"80\" /></div><div><label><font color='#FFF'>hide</font></label>Reverse:<input id=\"mt_mRNASeq_primer_r\" name=\"mt_mRNASeq_primer_r[]\" type=\"text\" size=\"80\" /></div><label>Mutated Descriptioin</label><textarea name=\"mt_desc[]\" cols=\"60\" rows=\"5\"></textarea></fieldset>"); 
        };

        </script>
    
       
    </head>

    <body>
    <div id="wrapper">

    <h2>miRTarBase -- Input FORM</h2>
    
    <form action="insert.php" method="get">
      
    <p class="legend"><strong>Note:</strong> Required fields are marked with an asterisk (<em>*</em>)</p>
      
    <fieldset>
	<legend>Reference Information</legend>
	<div><label for="pmid">PMID <em>*</em></label> <input id="pmid" type="text" name="pmid"  /></div>
    </fieldset>
    
    <fieldset>
    <legend>MTI Information</legend>
	<div>

	  <label for="species_mirna">Species (miRNA) <em>*</em></label> 
	  <select id="species_mirna" name="species_mirna" validate="required:true" title="Please select the species of miRNA!">
            <optgroup label="Species of miRNA">
	      <option value="">Please select...</option>
	                    <option id='hsa' value='hsa'>Human (Homo sapiens)</option>
	                    <option id='mmu' value='mmu'>Mouse (Mus musculus)</option>
	                    <option id='rno' value='rno'>Rat (Rattus norvegicus)</option>
	                    <option id='gga' value='gga'>Chicken (Gallus gallus)</option>
	                    <option id='bta' value='bta'>Cattle (Bos taurus)</option>
	                    <option id='oar' value='oar'>Sheep (Ovis aries)</option>
	                    <option id='dre' value='dre'>Zebrafish (Danio rerio)</option>
	                    <option id='dme' value='dme'>Fruit fly (Drosophila melanogaster)</option>
	                    <option id='bmo' value='bmo'>Silkworm (Bombyx mori)</option>
	                    <option id='xla' value='xla'>African clawed frog (Xenopus laevis)</option>
	                    <option id='cel' value='cel'>Nematode (Caenorhabditis elegans)</option>
	                    <option id='xtr' value='xtr'>Western clawed frog (Xenopus tropicalis)</option>
	                    <option id='mtr' value='mtr'>Barrel medic (Medicago truncatula)</option>
	                    <option id='pta' value='pta'>Loblolly pine (Pinus taeda)</option>
	                    <option id='osa' value='osa'>Rice (Oryza sativa)</option>
	                    <option id='ath' value='ath'>Thale cress (Arabidopsis thaliana)</option>
	                    <option id='ebv' value='ebv'>Epstein-Barr virus (Epstein Barr virus)</option>
	                    <option id='kshv' value='kshv'>HHV-8 (Kaposi sarcoma-associated herpesvirus)</option>
	                    <option id='hiv1' value='hiv1'>HIV-1 (Human immunodeficiency virus 1)</option>
	                    <option id='hsv1' value='hsv1'>HSV-1 (Herpes Simplex Virus 1)</option>
	                    <option id='hcmv' value='hcmv'>Human cytomegalovirus (Human cytomegalovirus)</option>
	                    <option id='pfv-1' value='pfv-1'>PFV-1 (Primate foamy virus type 1)</option>
	                    <option id='vsv' value='vsv'>VSV (Vesicular stomatitis Indiana virus)</option>
	                    <option id='aqu' value='aqu'> (Amphimedon queenslandica)</option>
	                    <option id='aqc' value='aqc'> (Aquilegia coerulea)</option>
	                    <option id='bkv' value='bkv'> (BK polyomavirus)</option>
	                    <option id='bhv1' value='bhv1'> (Bovine herpesvirus 1)</option>
	                    <option id='bdi' value='bdi'> (Brachypodium distachyon)</option>
	                    <option id='bol' value='bol'> (Brassica oleracea)</option>
	                    <option id='cbr' value='cbr'> (Caenorhabditis briggsae)</option>
	                    <option id='crm' value='crm'> (Caenorhabditis remanei)</option>
	                    <option id='cap' value='cap'> (Capitella sp. I)</option>
	                    <option id='cte' value='cte'> (Capitella teleta)</option>
	                    <option id='cre' value='cre'> (Chlamydomonas reinhardtii)</option>
	                    <option id='cin' value='cin'> (Ciona intestinalis)</option>
	                    <option id='csa' value='csa'> (Ciona savignyi)</option>
	                    <option id='ccl' value='ccl'> (Citrus clementine)</option>
	                    <option id='ddi' value='ddi'> (Dictyostelium discoideum)</option>
	                    <option id='dan' value='dan'> (Drosophila ananassae)</option>
	                    <option id='der' value='der'> (Drosophila erecta)</option>
	                    <option id='dgr' value='dgr'> (Drosophila grimshawi)</option>
	                    <option id='dmo' value='dmo'> (Drosophila mojavensis)</option>
	                    <option id='dpe' value='dpe'> (Drosophila persimilis)</option>
	                    <option id='dps' value='dps'> (Drosophila pseudoobscura)</option>
	                    <option id='dse' value='dse'> (Drosophila sechellia)</option>
	                    <option id='dsi' value='dsi'> (Drosophila simulans)</option>
	                    <option id='dvi' value='dvi'> (Drosophila virilis)</option>
	                    <option id='dwi' value='dwi'> (Drosophila willistoni)</option>
	                    <option id='dya' value='dya'> (Drosophila yakuba)</option>
	                    <option id='ghb' value='ghb'> (Gossypium herbecium)</option>
	                    <option id='gra' value='gra'> (Gossypium rammindii)</option>
	                    <option id='hbv' value='hbv'> (Herpes B virus)</option>
	                    <option id='hsv2' value='hsv2'> (Herpes Simplex Virus 2)</option>
	                    <option id='hvt' value='hvt'> (Herpesvirus of turkeys)</option>
	                    <option id='hma' value='hma'> (Hydra magnipapillata)</option>
	                    <option id='iltv' value='iltv'> (Infectious laryngotracheitis virus)</option>
	                    <option id='jcv' value='jcv'> (JC polyomavirus)</option>
	                    <option id='lgi' value='lgi'> (Lottia gigantea)</option>
	                    <option id='lja' value='lja'> (Lotus japonicus)</option>
	                    <option id='mdv1' value='mdv1'> (Mareks disease virus)</option>
	                    <option id='mdv2' value='mdv2'> (Mareks disease virus type 2)</option>
	                    <option id='mcv' value='mcv'> (Merkel cell polyomavirus)</option>
	                    <option id='mcmv' value='mcmv'> (Mouse cytomegalovirus)</option>
	                    <option id='mghv' value='mghv'> (Mouse gammaherpesvirus 68)</option>
	                    <option id='odi' value='odi'> (Oikopleura dioica)</option>
	                    <option id='ppt' value='ppt'> (Physcomitrella patens)</option>
	                    <option id='peu' value='peu'> (Populus euphratica)</option>
	                    <option id='ppc' value='ppc'> (Pristionchus pacificus)</option>
	                    <option id='rrv' value='rrv'> (Rhesus monkey rhadinovirus)</option>
	                    <option id='sko' value='sko'> (Saccoglossus kowalevskii)</option>
	                    <option id='sja' value='sja'> (Schistosoma japonicum)</option>
	                    <option id='sma' value='sma'> (Schistosoma mansoni)</option>
	                    <option id='smo' value='smo'> (Selaginella moellendorffii)</option>
	                    <option id='sv40' value='sv40'> (Simian virus 40)</option>
	                    <option id='ad5' value='ad5'>adenovirus Ad5 (Human adenovirus 5)</option>
	                    <option id='aga' value='aga'>African malaria mosquito (Anopheles gambiae)</option>
	                    <option id='bma' value='bma'>Agent of lymphatic filariasis (Brugia malayi)</option>
	                    <option id='pbi' value='pbi'>Black snub-nosed monkey (Pygathrix bieti)</option>
	                    <option id='age' value='age'>Black-handed spider monkey (Ateles geoffroyi)</option>
	                    <option id='isc' value='isc'>Black-legged tick (Ixodes scapularis)</option>
	                    <option id='ppy' value='ppy'>Bornean orangutan (Pongo pygmaeus)</option>
	                    <option id='tae' value='tae'>Bread wheat (Triticum aestivum)</option>
	                    <option id='lla' value='lla'>Brown woolly monkey (Lagothrix lagotricha)</option>
	                    <option id='rco' value='rco'>Castor bean (Ricinus communis)</option>
	                    <option id='ptr' value='ptr'>Chimpanzee (Pan troglodytes)</option>
	                    <option id='cgr' value='cgr'>Chinese hamster (Cricetulus griseus)</option>
	                    <option id='ccr' value='ccr'>common carp (Cyprinus carpio)</option>
	                    <option id='dpu' value='dpu'>Common water flea (Daphnia pulex)</option>
	                    <option id='vun' value='vun'>Cowpea (Vigna unguiculata)</option>
	                    <option id='mdm' value='mdm'>Cultivated apple (Malus domestica)</option>
	                    <option id='cfa' value='cfa'>Dog (Canis familiaris)</option>
	                    <option id='bra' value='bra'>Field mustard (Brassica rapa)</option>
	                    <option id='bfl' value='bfl'>Florida lancelet (Branchiostoma floridae)</option>
	                    <option id='sme' value='sme'>Freshwater planarian (Schmidtea mediterranea)</option>
	                    <option id='fru' value='fru'>Fugu (Fugu rubripes)</option>
	                    <option id='mdo' value='mdo'>Gray short-tailed opossum (Monodelphis domestica)</option>
	                    <option id='ame' value='ame'>Honey bee (Apis mellifera)</option>
	                    <option id='eca' value='eca'>Horse (Equus caballus)</option>
	                    <option id='ola' value='ola'>Japanese medaka (Oryzias latipes)</option>
	                    <option id='nvi' value='nvi'>Jewel wasp (Nasonia vitripennis)</option>
	                    <option id='zma' value='zma'>Maize (Zea mays)</option>
	                    <option id='lmi' value='lmi'>Migratory locust (Locusta migratoria)</option>
	                    <option id='cla' value='cla'>Milky ribbon-worm (Cerebratulus lacteus)</option>
	                    <option id='cpa' value='cpa'>Papaya (Carica papaya)</option>
	                    <option id='api' value='api'>Pea aphid (Acyrthosiphon pisum)</option>
	                    <option id='ahy' value='ahy'>Peanut (Arachis hypogaea)</option>
	                    <option id='ssc' value='ssc'>Pig (Sus scrofa)</option>
	                    <option id='mne' value='mne'>Pig-tailed macaque (Macaca nemestrina)</option>
	                    <option id='oan' value='oan'>Platypus (Ornithorhynchus anatinus)</option>
	                    <option id='spu' value='spu'>Purple urchin (Strongylocentrotus purpuratus)</option>
	                    <option id='ppa' value='ppa'>Pygmy chimpanzee (Pan paniscus)</option>
	                    <option id='bna' value='bna'>Rape (Brassica napus)</option>
	                    <option id='hru' value='hru'>Red abalone (Haliotis rufescens)</option>
	                    <option id='tca' value='tca'>Red flour beetle (Tribolium castaneum)</option>
	                    <option id='sla' value='sla'>Red-chested mustached tamarin (Saguinus labiatus)</option>
	                    <option id='rlcv' value='rlcv'>Rhesus lymphocryptovirus (Rhesus lymphocryptovirus)</option>
	                    <option id='mml' value='mml'>Rhesus monkey (Macaca mulatta)</option>
	                    <option id='lca' value='lca'>Ring-tailed lemur (Lemur catta)</option>
	                    <option id='ssy' value='ssy'>Siamang (Symphalangus syndactylus)</option>
	                    <option id='sbi' value='sbi'>Sorghum (Sorghum bicolor)</option>
	                    <option id='cqu' value='cqu'>Southern house mosquito (Culex quinquefasciatus)</option>
	                    <option id='gma' value='gma'>Soybean (Glycine max)</option>
	                    <option id='tni' value='tni'>Spotted green pufferfish (Tetraodon nigroviridis)</option>
	                    <option id='nve' value='nve'>Starlet sea anemone (Nematostella vectensis)</option>
	                    <option id='pvu' value='pvu'>String bean (Phaseolus vulgaris)</option>
	                    <option id='sof' value='sof'>Sugarcane (Saccharum officinarum)</option>
	                    <option id='csi' value='csi'>Sweet orange (Citrus sinensis)</option>
	                    <option id='crt' value='crt'>Tangerine (Citrus reticulata)</option>
	                    <option id='sly' value='sly'>Tomato (Solanum lycopersicum)</option>
	                    <option id='gar' value='gar'>Tree cotton (Gossypium arboreum)</option>
	                    <option id='ctr' value='ctr'>Trifoliate orange (Citrus trifoliata)</option>
	                    <option id='ghr' value='ghr'>Upland cotton (Gossypium hirsutum)</option>
	                    <option id='ptc' value='ptc'>Western balsam poplar (Populus trichocarpa)</option>
	                    <option id='ggo' value='ggo'>Western Gorilla (Gorilla gorilla)</option>
	                    <option id='gso' value='gso'>Wild soybean (Glycine soja)</option>
	                    <option id='vvi' value='vvi'>Wine grape (Vitis vinifera)</option>
	                    <option id='aae' value='aae'>Yellow fever mosquito (Aedes aegypti)</option>
	                    <option id='tgu' value='tgu'>Zebra finch (Taeniopygia guttata)</option>
	                  </optgroup>
          </select>
	</div>
	
	<div>
          <label for="species_target">Species (Target) <em>*</em></label>
          <select id="species_target" name="species_target" validate="required:true" title="Please select the species of miRNA!">
            <optgroup label="Species of target">
      	      <option value="">Please select...</option>
                            <option id='hsa' value='hsa'>Human (Homo sapiens)</option>
                            <option id='mmu' value='mmu'>Mouse (Mus musculus)</option>
                            <option id='rno' value='rno'>Rat (Rattus norvegicus)</option>
                            <option id='gga' value='gga'>Chicken (Gallus gallus)</option>
                            <option id='bta' value='bta'>Cattle (Bos taurus)</option>
                            <option id='oar' value='oar'>Sheep (Ovis aries)</option>
                            <option id='dre' value='dre'>Zebrafish (Danio rerio)</option>
                            <option id='dme' value='dme'>Fruit fly (Drosophila melanogaster)</option>
                            <option id='bmo' value='bmo'>Silkworm (Bombyx mori)</option>
                            <option id='xla' value='xla'>African clawed frog (Xenopus laevis)</option>
                            <option id='cel' value='cel'>Nematode (Caenorhabditis elegans)</option>
                            <option id='xtr' value='xtr'>Western clawed frog (Xenopus tropicalis)</option>
                            <option id='mtr' value='mtr'>Barrel medic (Medicago truncatula)</option>
                            <option id='pta' value='pta'>Loblolly pine (Pinus taeda)</option>
                            <option id='osa' value='osa'>Rice (Oryza sativa)</option>
                            <option id='ath' value='ath'>Thale cress (Arabidopsis thaliana)</option>
                            <option id='ebv' value='ebv'>Epstein-Barr virus (Epstein Barr virus)</option>
                            <option id='kshv' value='kshv'>HHV-8 (Kaposi sarcoma-associated herpesvirus)</option>
                            <option id='hiv1' value='hiv1'>HIV-1 (Human immunodeficiency virus 1)</option>
                            <option id='hsv1' value='hsv1'>HSV-1 (Herpes Simplex Virus 1)</option>
                            <option id='hcmv' value='hcmv'>Human cytomegalovirus (Human cytomegalovirus)</option>
                            <option id='pfv-1' value='pfv-1'>PFV-1 (Primate foamy virus type 1)</option>
                            <option id='vsv' value='vsv'>VSV (Vesicular stomatitis Indiana virus)</option>
                            <option id='aqu' value='aqu'> (Amphimedon queenslandica)</option>
                            <option id='aqc' value='aqc'> (Aquilegia coerulea)</option>
                            <option id='bkv' value='bkv'> (BK polyomavirus)</option>
                            <option id='bhv1' value='bhv1'> (Bovine herpesvirus 1)</option>
                            <option id='bdi' value='bdi'> (Brachypodium distachyon)</option>
                            <option id='bol' value='bol'> (Brassica oleracea)</option>
                            <option id='cbr' value='cbr'> (Caenorhabditis briggsae)</option>
                            <option id='crm' value='crm'> (Caenorhabditis remanei)</option>
                            <option id='cap' value='cap'> (Capitella sp. I)</option>
                            <option id='cte' value='cte'> (Capitella teleta)</option>
                            <option id='cre' value='cre'> (Chlamydomonas reinhardtii)</option>
                            <option id='cin' value='cin'> (Ciona intestinalis)</option>
                            <option id='csa' value='csa'> (Ciona savignyi)</option>
                            <option id='ccl' value='ccl'> (Citrus clementine)</option>
                            <option id='ddi' value='ddi'> (Dictyostelium discoideum)</option>
                            <option id='dan' value='dan'> (Drosophila ananassae)</option>
                            <option id='der' value='der'> (Drosophila erecta)</option>
                            <option id='dgr' value='dgr'> (Drosophila grimshawi)</option>
                            <option id='dmo' value='dmo'> (Drosophila mojavensis)</option>
                            <option id='dpe' value='dpe'> (Drosophila persimilis)</option>
                            <option id='dps' value='dps'> (Drosophila pseudoobscura)</option>
                            <option id='dse' value='dse'> (Drosophila sechellia)</option>
                            <option id='dsi' value='dsi'> (Drosophila simulans)</option>
                            <option id='dvi' value='dvi'> (Drosophila virilis)</option>
                            <option id='dwi' value='dwi'> (Drosophila willistoni)</option>
                            <option id='dya' value='dya'> (Drosophila yakuba)</option>
                            <option id='ghb' value='ghb'> (Gossypium herbecium)</option>
                            <option id='gra' value='gra'> (Gossypium rammindii)</option>
                            <option id='hbv' value='hbv'> (Herpes B virus)</option>
                            <option id='hsv2' value='hsv2'> (Herpes Simplex Virus 2)</option>
                            <option id='hvt' value='hvt'> (Herpesvirus of turkeys)</option>
                            <option id='hma' value='hma'> (Hydra magnipapillata)</option>
                            <option id='iltv' value='iltv'> (Infectious laryngotracheitis virus)</option>
                            <option id='jcv' value='jcv'> (JC polyomavirus)</option>
                            <option id='lgi' value='lgi'> (Lottia gigantea)</option>
                            <option id='lja' value='lja'> (Lotus japonicus)</option>
                            <option id='mdv1' value='mdv1'> (Mareks disease virus)</option>
                            <option id='mdv2' value='mdv2'> (Mareks disease virus type 2)</option>
                            <option id='mcv' value='mcv'> (Merkel cell polyomavirus)</option>
                            <option id='mcmv' value='mcmv'> (Mouse cytomegalovirus)</option>
                            <option id='mghv' value='mghv'> (Mouse gammaherpesvirus 68)</option>
                            <option id='odi' value='odi'> (Oikopleura dioica)</option>
                            <option id='ppt' value='ppt'> (Physcomitrella patens)</option>
                            <option id='peu' value='peu'> (Populus euphratica)</option>
                            <option id='ppc' value='ppc'> (Pristionchus pacificus)</option>
                            <option id='rrv' value='rrv'> (Rhesus monkey rhadinovirus)</option>
                            <option id='sko' value='sko'> (Saccoglossus kowalevskii)</option>
                            <option id='sja' value='sja'> (Schistosoma japonicum)</option>
                            <option id='sma' value='sma'> (Schistosoma mansoni)</option>
                            <option id='smo' value='smo'> (Selaginella moellendorffii)</option>
                            <option id='sv40' value='sv40'> (Simian virus 40)</option>
                            <option id='ad5' value='ad5'>adenovirus Ad5 (Human adenovirus 5)</option>
                            <option id='aga' value='aga'>African malaria mosquito (Anopheles gambiae)</option>
                            <option id='bma' value='bma'>Agent of lymphatic filariasis (Brugia malayi)</option>
                            <option id='pbi' value='pbi'>Black snub-nosed monkey (Pygathrix bieti)</option>
                            <option id='age' value='age'>Black-handed spider monkey (Ateles geoffroyi)</option>
                            <option id='isc' value='isc'>Black-legged tick (Ixodes scapularis)</option>
                            <option id='ppy' value='ppy'>Bornean orangutan (Pongo pygmaeus)</option>
                            <option id='tae' value='tae'>Bread wheat (Triticum aestivum)</option>
                            <option id='lla' value='lla'>Brown woolly monkey (Lagothrix lagotricha)</option>
                            <option id='rco' value='rco'>Castor bean (Ricinus communis)</option>
                            <option id='ptr' value='ptr'>Chimpanzee (Pan troglodytes)</option>
                            <option id='cgr' value='cgr'>Chinese hamster (Cricetulus griseus)</option>
                            <option id='ccr' value='ccr'>common carp (Cyprinus carpio)</option>
                            <option id='dpu' value='dpu'>Common water flea (Daphnia pulex)</option>
                            <option id='vun' value='vun'>Cowpea (Vigna unguiculata)</option>
                            <option id='mdm' value='mdm'>Cultivated apple (Malus domestica)</option>
                            <option id='cfa' value='cfa'>Dog (Canis familiaris)</option>
                            <option id='bra' value='bra'>Field mustard (Brassica rapa)</option>
                            <option id='bfl' value='bfl'>Florida lancelet (Branchiostoma floridae)</option>
                            <option id='sme' value='sme'>Freshwater planarian (Schmidtea mediterranea)</option>
                            <option id='fru' value='fru'>Fugu (Fugu rubripes)</option>
                            <option id='mdo' value='mdo'>Gray short-tailed opossum (Monodelphis domestica)</option>
                            <option id='ame' value='ame'>Honey bee (Apis mellifera)</option>
                            <option id='eca' value='eca'>Horse (Equus caballus)</option>
                            <option id='ola' value='ola'>Japanese medaka (Oryzias latipes)</option>
                            <option id='nvi' value='nvi'>Jewel wasp (Nasonia vitripennis)</option>
                            <option id='zma' value='zma'>Maize (Zea mays)</option>
                            <option id='lmi' value='lmi'>Migratory locust (Locusta migratoria)</option>
                            <option id='cla' value='cla'>Milky ribbon-worm (Cerebratulus lacteus)</option>
                            <option id='cpa' value='cpa'>Papaya (Carica papaya)</option>
                            <option id='api' value='api'>Pea aphid (Acyrthosiphon pisum)</option>
                            <option id='ahy' value='ahy'>Peanut (Arachis hypogaea)</option>
                            <option id='ssc' value='ssc'>Pig (Sus scrofa)</option>
                            <option id='mne' value='mne'>Pig-tailed macaque (Macaca nemestrina)</option>
                            <option id='oan' value='oan'>Platypus (Ornithorhynchus anatinus)</option>
                            <option id='spu' value='spu'>Purple urchin (Strongylocentrotus purpuratus)</option>
                            <option id='ppa' value='ppa'>Pygmy chimpanzee (Pan paniscus)</option>
                            <option id='bna' value='bna'>Rape (Brassica napus)</option>
                            <option id='hru' value='hru'>Red abalone (Haliotis rufescens)</option>
                            <option id='tca' value='tca'>Red flour beetle (Tribolium castaneum)</option>
                            <option id='sla' value='sla'>Red-chested mustached tamarin (Saguinus labiatus)</option>
                            <option id='rlcv' value='rlcv'>Rhesus lymphocryptovirus (Rhesus lymphocryptovirus)</option>
                            <option id='mml' value='mml'>Rhesus monkey (Macaca mulatta)</option>
                            <option id='lca' value='lca'>Ring-tailed lemur (Lemur catta)</option>
                            <option id='ssy' value='ssy'>Siamang (Symphalangus syndactylus)</option>
                            <option id='sbi' value='sbi'>Sorghum (Sorghum bicolor)</option>
                            <option id='cqu' value='cqu'>Southern house mosquito (Culex quinquefasciatus)</option>
                            <option id='gma' value='gma'>Soybean (Glycine max)</option>
                            <option id='tni' value='tni'>Spotted green pufferfish (Tetraodon nigroviridis)</option>
                            <option id='nve' value='nve'>Starlet sea anemone (Nematostella vectensis)</option>
                            <option id='pvu' value='pvu'>String bean (Phaseolus vulgaris)</option>
                            <option id='sof' value='sof'>Sugarcane (Saccharum officinarum)</option>
                            <option id='csi' value='csi'>Sweet orange (Citrus sinensis)</option>
                            <option id='crt' value='crt'>Tangerine (Citrus reticulata)</option>
                            <option id='sly' value='sly'>Tomato (Solanum lycopersicum)</option>
                            <option id='gar' value='gar'>Tree cotton (Gossypium arboreum)</option>
                            <option id='ctr' value='ctr'>Trifoliate orange (Citrus trifoliata)</option>
                            <option id='ghr' value='ghr'>Upland cotton (Gossypium hirsutum)</option>
                            <option id='ptc' value='ptc'>Western balsam poplar (Populus trichocarpa)</option>
                            <option id='ggo' value='ggo'>Western Gorilla (Gorilla gorilla)</option>
                            <option id='gso' value='gso'>Wild soybean (Glycine soja)</option>
                            <option id='vvi' value='vvi'>Wine grape (Vitis vinifera)</option>
                            <option id='aae' value='aae'>Yellow fever mosquito (Aedes aegypti)</option>
                            <option id='tgu' value='tgu'>Zebra finch (Taeniopygia guttata)</option>
                          </optgroup>
          </select>
        </div>

        <div>
        <label for="mirna"> miRNA<em>*</em></label>
        <input id="mirna" name="mirna" type="text" size="30" /><a href='http://www.mirbase.org/' target='_new'><img src="http://www.mirbase.org/images/mirbase-logo-blue-web.png" height=30></a>
        </div>
        <div>
        <label>Official miRNA name</label>
        <input id='official_mirna_name' type='text' name='official_mirna_name' />
        </div>
        <div>
        <label>Mature miRNA accession</label>
        <input id='mature_mirna_accession' type='text' name='mature_mirna_accession' />
        </div>
        <div>
        <label>Mature miRNA Sequence </label> 
        5'<input id='mature_mirna_sequence_1' type='text' name='mature_mirna_sequence_1'  SIZE='40' />3'
        </div>
        <div>
        3'<input id='mature_mirna_sequence_2' type='text' name='mature_mirna_sequence_2'  SIZE='40' />5'
        </div>
        <div>
        <label for="gene_symbol">Gene Symbol (Target) <em>*</em></label> 
        <input id="gene_symbol" name="gene_symbol" type="text" size="30" />
        </div>
        <div>
        <label>Official Gene Symbol</label>
        <input id="official_gene_symbol" name="official_gene_symbol" type="text" size="30" />
        </div>
        <div>
        <label>Entrez Gene ID</label>
        <input id="entrez_gene_id" name="entrez_gene_id" type="text" size="30" />
        </div>

        <div>
        <label for="cell_line"> Cell Line<em>*</em></label>
        <input id="cell_line" name="cell_line" type="text" size="80" /> (如果不確定cell line的物種，可以查詢CLDB)<a href="http://bioinformatics.istge.it/hypercldb/search.html"  target='_new'><img src='http://bioinformatics.istge.it/hypercldb/tab3.png' height=30></a>
        </div>

        <div class="controlset">
	  <span class="label">Location<em>*</em></span>
	  <input name="loc"  value="3UTR" type="radio" /> <label for="loc">3'UTR</label>
  	<input name="loc"  value="CDS" type="radio" /> <label for="loc">CDS</label>
  	<input name="loc"  value="5UTR" type="radio" /> <label for="loc">5'UTR</label>
	  <input name="loc"  value="NCR" type="radio" /> <label for="loc">NCR (Non-Coding Region)</label>
	  <input name="loc"  value="3LTR" type="radio" /> <label for="loc">3'LTR</label>
	  <input name="loc"  value="Unknown" type="radio" /> <label for="loc">Unknown</label>
	</div>
	<div>
	  <label for="validated_method"> Validated method<em>*</em></label>
          <select id="validated_method" name="validated_method" MULTIPLE size="10">
            <optgroup label="validated_method">
	    <option value="">Please select...</option>
                        <option value='2-D Gel Electrophoresis (2DGE)'>2-D Gel Electrophoresis (2DGE)</option>
                        <option value='5RACE'>5RACE</option>
                        <option value='B-globin reporter assay'>B-globin reporter assay</option>
                        <option value='ChIP-seq'>ChIP-seq</option>
                        <option value='Degradome sequencing'>Degradome sequencing</option>
                        <option value='ELISA'>ELISA</option>
                        <option value='EMSA'>EMSA</option>
                        <option value='FACS'>FACS</option>
                        <option value='Flow'>Flow</option>
                        <option value='GFP reporter assay'>GFP reporter assay</option>
                        <option value='Gluc reporter assay'>Gluc reporter assay</option>
                        <option value='GUS reporter assay'>GUS reporter assay</option>
                        <option value='HITS-CLIP'>HITS-CLIP</option>
                        <option value='Immunoblot'>Immunoblot</option>
                        <option value='Immunocytochemistry'>Immunocytochemistry</option>
                        <option value='Immunofluorescence'>Immunofluorescence</option>
                        <option value='Immunohistochemistry'>Immunohistochemistry</option>
                        <option value='Immunoprecipitaion'>Immunoprecipitaion</option>
                        <option value='In situ hybridization'>In situ hybridization</option>
                        <option value='LacZ reporter assay'>LacZ reporter assay</option>
                        <option value='Luciferase reporter assay'>Luciferase reporter assay</option>
                        <option value='Mass spectrometry'>Mass spectrometry</option>
                        <option value='Microarray'>Microarray</option>
                        <option value='Next Generation Sequencing (NGS)'>Next Generation Sequencing (NGS)</option>
                        <option value='Northern blot'>Northern blot</option>
                        <option value='pSILAC'>pSILAC</option>
                        <option value='qRT-PCR'>qRT-PCR</option>
                        <option value='Quantitative proteomic approach'>Quantitative proteomic approach</option>
                        <option value='Western blot'>Western blot</option>
                        </optgroup>
          </select>
          <strong>Your selected item:</strong><input type="text" id="method_sel" name="method_sel" size="60">
        </div>
  
	<div>
	  <label for="prediction_tools"> Prediction tools<em>*</em></label>
          <select id="prediction_tools" name="prediction_tools" MULTIPLE SIZE="10">
            <optgroup label="prediction_tools">
    	    <option value="">Please select...</option>
                        <option value='DAVID'>DAVID</option>
                        <option value='DIANA-microT'>DIANA-microT</option>
                        <option value='EIMMO'>EIMMO</option>
                        <option value='EMBL'>EMBL</option>
                        <option value='FASTH'>FASTH</option>
                        <option value='Hitsensor algorithm'>Hitsensor algorithm</option>
                        <option value='HOCTAR'>HOCTAR</option>
                        <option value='IPA'>IPA</option>
                        <option value='MAMI'>MAMI</option>
                        <option value='mfold'>mfold</option>
                        <option value='miBridge'>miBridge</option>
                        <option value='MicroCible'>MicroCible</option>
                        <option value='MicroCosm'>MicroCosm</option>
                        <option value='MicroInspector'>MicroInspector</option>
                        <option value='microRNA.org'>microRNA.org</option>
                        <option value='miRanda'>miRanda</option>
                        <option value='miRBase Target Database'>miRBase Target Database</option>
                        <option value='miRDB'>miRDB</option>
                        <option value='miRecord'>miRecord</option>
                        <option value='mirGen'>mirGen</option>
                        <option value='miRNAMap'>miRNAMap</option>
                        <option value='miRNAviewer'>miRNAviewer</option>
                        <option value='miRTar'>miRTar</option>
                        <option value='miRU'>miRU</option>
                        <option value='miRWalk'>miRWalk</option>
                        <option value='miTarget'>miTarget</option>
                        <option value='MSigDB'>MSigDB</option>
                        <option value='NA'>NA</option>
                        <option value='Patrocles'>Patrocles</option>
                        <option value='PatScan'>PatScan</option>
                        <option value='PicTar'>PicTar</option>
                        <option value='PITA'>PITA</option>
                        <option value='previous_study'>previous_study</option>
                        <option value='Reptar'>Reptar</option>
                        <option value='RNA22'>RNA22</option>
                        <option value='RNAhybrid'>RNAhybrid</option>
                        <option value='TarBase'>TarBase</option>
                        <option value='TargetBoost'>TargetBoost</option>
                        <option value='TargetCombo'>TargetCombo</option>
                        <option value='TargetRank'>TargetRank</option>
                        <option value='TargetScan'>TargetScan</option>
                        <option value='TargetScanS'>TargetScanS</option>
                        </optgroup>
          </select>
          <strong>Your selected item:</strong><input type="text" id="tool_sel" name="tool_sel" size="60">
	</div>
	
	<div>
        <label for="original_description"> Original Description (Extracted from the article)</label>
        <textarea name="original_description" cols="60" rows="10"></textarea>
    </div>
	<div>
        <label for="note"> Note</label>
        <textarea name="note" cols="60" rows="5"></textarea>
    </div>
	<div>
        <label for="tf">TF (miRNA) related article</label>
        <input name="tf" id="tf" value="TRUE" type="checkbox">
	</div>	
    </fieldset>

    
    
    
    
    
    
    <fieldset>
	<legend>Disease Information</legend>
	<div>
	  <label for="disease">Disease </label> 
	  <input id="disease" type="text" name="disease" value="" size="80" />
	</div>
	<div>
	  <label for="relationship_type">Relationship Type </label>
	  <input type="radio" name="relationship_type" value="Induced">Induced
	  <input type="radio" name="relationship_type" value="Supressed">Supressed
	  <input type="radio" name="relationship_type" value="Unspecified">Unspecified
	</div>
	<div>
	  <label for="expression_pattern_of_mirna">Expression pattern of miRNA </label>
          <input type="radio" name="expression_pattern_of_mirna" value="Down-regulated">Down-regulated
          <input type="radio" name="expression_pattern_of_mirna" value="Up-regulated">Up-regulated
	</div>
  <div>
	  <label for="dis_desc"> Description of miRNA-disease relationship</label> 
	  <textarea name="dis_desc" cols="60" rows="10"></textarea>
	</div>
    </fieldset>
  <!--
	<legend>Site Information</legend>
	<input type="button" value="Add WT Block" onclick="addWTInfo()"/>	<input type="button" value="Add Mutant Block" onclick="addMTInfo()"/>

    <fieldset>  <legend>WT</legend>   <div class="controlset">    <span class="label">Support Type <em>*</em></span>    <input name="wt_support_type[]" id="wt_support_type" value="TRUE" type="checkbox" validate="required:true"/> <label for="support_type">TRUE MTI</label>     <input name="wt_support_type[]" id="wt_support_type" value="FALSE" type="checkbox" /> <label for="support_type">FALSE MTI</label>  </div> <div><label for='mrna'>mRNA ID (RefSeq):</label><input id='mrna' name='mrna' type='text' size='80'></div><div><label for='site_name'>Site name:</label><input id='wt_site_name' name='wt_site_name[]' type='text' size='80'></div><div> <label for="wt_mRNASeq">mRNA Seq (Target; 5'->3') </label>  <input id="wt_mRNASeq" name="wt_mRNASeq[]" type="text" size="80" /></div><div><label for="wt_mRNASeq">mRNA Primer</label>  Forward: <input id="wt_mRNASeq_primer_f" name="wt_mRNASeq_primer_f[]" type="text" size="80" /><div><label><font color="#FFF">hide</font></label>Reverse:<input id="wt_mRNASeq_primer_r" name="wt_mRNASeq_primer_r[]" type="text" size="80" /><a href='http://genome.ucsc.edu/cgi-bin/hgPcr?command=start' target='_new'>【UCSC In-Silico PCR】</a></div><div id="pcr"></div>
    </fieldset>
 	
	<div id="addWT"></div>
	<div id="addMT"></div>
    </fieldset>
   

    <div class="buttonrow">
    <input type="submit" value="Save" class="button" />
    </div>
      -->
    </form>
    </body>
</html>
