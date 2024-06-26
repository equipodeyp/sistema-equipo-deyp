<?php
// enero
$defenero = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-01-01' AND '2023-01-31'";
$rdefenero = $mysqli->query($defenero);
$fdefenero = $rdefenero->fetch_assoc();
//
$defasisenero = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'asistencia' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-01-01' AND '2023-01-31'";
$rdefasisenero = $mysqli->query($defasisenero);
$fdefasisenero = $rdefasisenero->fetch_assoc();
//
$defresgenero = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'resguardo' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-01-01' AND '2023-01-31'";
$rdefresgenero = $mysqli->query($defresgenero);
$fdefresgenero = $rdefresgenero->fetch_assoc();
//febrero
$deffebrero = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-02-01' AND '2023-02-28'";
$rdeffebrero = $mysqli->query($deffebrero);
$fdeffebrero = $rdeffebrero->fetch_assoc();
//
$defasisfebrero = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'asistencia' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-02-01' AND '2023-02-28'";
$rdefasisfebrero = $mysqli->query($defasisfebrero);
$fdefasisfebrero = $rdefasisfebrero->fetch_assoc();
//
$defresgfebrero = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'resguardo' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-02-01' AND '2023-02-28'";
$rdefresgfebrero = $mysqli->query($defresgfebrero);
$fdefresgfebrero = $rdefresgfebrero->fetch_assoc();
//marzo
$defmarzo = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-03-01' AND '2023-03-31'";
$rdefmarzo = $mysqli->query($defmarzo);
$fdefmarzo = $rdefmarzo->fetch_assoc();
//
$defasismarzo = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'asistencia' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-03-01' AND '2023-03-31'";
$rdefasismarzo = $mysqli->query($defasismarzo);
$fdefasismarzo = $rdefasismarzo->fetch_assoc();
//
$defresgmarzo = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'resguardo' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-03-01' AND '2023-03-31'";
$rdefresgmarzo = $mysqli->query($defresgmarzo);
$fdefresgmarzo = $rdefresgmarzo->fetch_assoc();
//abril
$defabril = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-04-01' AND '2023-04-30'";
$rdefabril = $mysqli->query($defabril);
$fdefabril = $rdefabril->fetch_assoc();
//
$defasisabril = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'asistencia' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-04-01' AND '2023-04-30'";
$rdefasisabril = $mysqli->query($defasisabril);
$fdefasisabril = $rdefasisabril->fetch_assoc();
//
$defresgabril = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'resguardo' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-04-01' AND '2023-04-30'";
$rdefresgabril = $mysqli->query($defresgabril);
$fdefresgabril = $rdefresgabril->fetch_assoc();
//mayo
$defmayo = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-05-01' AND '2023-05-31'";
$rdefmayo = $mysqli->query($defmayo);
$fdefmayo = $rdefmayo->fetch_assoc();
//
$defjunio = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-06-01' AND '2023-06-30'";
$rdefjunio = $mysqli->query($defjunio);
$fdefjunio = $rdefjunio->fetch_assoc();
//
$defjulio = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-07-01' AND '2023-07-31'";
$rdefjulio = $mysqli->query($defjulio);
$fdefjulio = $rdefjulio->fetch_assoc();
//
$defagosto = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-08-01' AND '2023-08-31'";
$rdefagosto = $mysqli->query($defagosto);
$fdefagosto = $rdefagosto->fetch_assoc();
//
$defseptiembre = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-09-01' AND '2023-09-30'";
$rdefseptiembre = $mysqli->query($defseptiembre);
$fdefseptiembre = $rdefseptiembre->fetch_assoc();
//
$defoctubre = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-10-01' AND '2023-10-31'";
$rdefoctubre = $mysqli->query($defoctubre);
$fdefoctubre = $rdefoctubre->fetch_assoc();
//
$defnoviembre = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-11-01' AND '2023-11-30'";
$rdefnoviembre = $mysqli->query($defnoviembre);
$fdefnoviembre = $rdefnoviembre->fetch_assoc();
//
$defdiciembre = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-12-01' AND '2023-12-31'";
$rdefdiciembre = $mysqli->query($defdiciembre);
$fdefdiciembre = $rdefdiciembre->fetch_assoc();
//
$defasismayo = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'asistencia' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-05-01' AND '2023-05-31'";
$rdefasismayo = $mysqli->query($defasismayo);
$fdefasismayo = $rdefasismayo->fetch_assoc();
//
$defasisjunio = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'asistencia' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-06-01' AND '2023-06-30'";
$rdefasisjunio = $mysqli->query($defasisjunio);
$fdefasisjunio = $rdefasisjunio->fetch_assoc();
//
$defasisjulio = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'asistencia' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-07-01' AND '2023-07-31'";
$rdefasisjulio = $mysqli->query($defasisjulio);
$fdefasisjulio = $rdefasisjulio->fetch_assoc();
//
$defasisagosto = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'asistencia' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-08-01' AND '2023-08-31'";
$rdefasisagosto = $mysqli->query($defasisagosto);
$fdefasisagosto = $rdefasisagosto->fetch_assoc();
//
$defasisseptiembre = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'asistencia' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-09-01' AND '2023-09-30'";
$rdefasisseptiembre = $mysqli->query($defasisseptiembre);
$fdefasisseptiembre = $rdefasisseptiembre->fetch_assoc();
//
$defasisoctubre = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'asistencia' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-10-01' AND '2023-10-31'";
$rdefasisoctubre = $mysqli->query($defasisoctubre);
$fdefasisoctubre = $rdefasisoctubre->fetch_assoc();
//
$defasisnoviembre = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'asistencia' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-11-01' AND '2023-11-30'";
$rdefasisnoviembre = $mysqli->query($defasisnoviembre);
$fdefasisnoviembre = $rdefasisnoviembre->fetch_assoc();
//
$defasisdiciembre = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'asistencia' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-12-01' AND '2023-12-31'";
$rdefasisdiciembre = $mysqli->query($defasisdiciembre);
$fdefasisdiciembre = $rdefasisdiciembre->fetch_assoc();
//
$defresgmayo = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'resguardo' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-05-01' AND '2023-05-31'";
$rdefresgmayo = $mysqli->query($defresgmayo);
$fdefresgmayo = $rdefresgmayo->fetch_assoc();
//
$defresgjunio = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'resguardo' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-06-01' AND '2023-06-30'";
$rdefresgjunio = $mysqli->query($defresgjunio);
$fdefresgjunio = $rdefresgjunio->fetch_assoc();
//
$defresgjulio = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'resguardo' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-07-01' AND '2023-07-31'";
$rdefresgjulio = $mysqli->query($defresgjulio);
$fdefresgjulio = $rdefresgjulio->fetch_assoc();
//
$defresgagosto = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'resguardo' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-08-01' AND '2023-08-31'";
$rdefresgagosto = $mysqli->query($defresgagosto);
$fdefresgagosto = $rdefresgagosto->fetch_assoc();
//
$defresgseptiembre = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'resguardo' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-09-01' AND '2023-09-30'";
$rdefresgseptiembre = $mysqli->query($defresgseptiembre);
$fdefresgseptiembre = $rdefresgseptiembre->fetch_assoc();
//
$defresgoctubre = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'resguardo' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-10-01' AND '2023-10-31'";
$rdefresgoctubre = $mysqli->query($defresgoctubre);
$fdefresgoctubre = $rdefresgoctubre->fetch_assoc();
//
$defresgnoviembre = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'resguardo' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-11-01' AND '2023-11-30'";
$rdefresgnoviembre = $mysqli->query($defresgnoviembre);
$fdefresgnoviembre = $rdefresgnoviembre->fetch_assoc();
//
$defresgdiciembre = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'resguardo' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-12-01' AND '2023-12-31'";
$rdefresgdiciembre = $mysqli->query($defresgdiciembre);
$fdefresgdiciembre = $rdefresgdiciembre->fetch_assoc();
//totales
$deftotal = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-01-01' AND '2023-12-31'";
$rdeftotal = $mysqli->query($deftotal);
$fdeftotal = $rdeftotal->fetch_assoc();
//
$defasistotal = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'asistencia' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-01-01' AND '2023-12-31'";
$rdefasistotal = $mysqli->query($defasistotal);
$fdefasistotal = $rdefasistotal->fetch_assoc();
//
$defresgtotal = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'definitiva' AND clasificacion = 'resguardo' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-01-01' AND '2023-12-31'";
$rdefresgtotal = $mysqli->query($defresgtotal);
$fdefresgtotal = $rdefresgtotal->fetch_assoc();
//enero provisionales
$provenero = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND estatus = 'EJECUTADA' AND date_definitva BETWEEN '2023-01-01' AND '2023-01-31'";
$rprovenero = $mysqli->query($provenero);
$fprovenero = $rprovenero->fetch_assoc();
//
$provasisenero = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'asistencia' AND estatus = 'EJECUTADA' AND date_definitva BETWEEN '2023-01-01' AND '2023-01-31'";
$rprovasisenero = $mysqli->query($provasisenero);
$fprovasisenero = $rprovasisenero->fetch_assoc();
//
$provresgenero = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'resguardo' AND estatus = 'EJECUTADA' AND date_definitva BETWEEN '2023-01-01' AND '2023-01-31'";
$rprovresgenero = $mysqli->query($provresgenero);
$fprovresgenero = $rprovresgenero->fetch_assoc();
//febrero provisionales
$provfebrero = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-02-01' AND '2023-02-28'";
$rprovfebrero = $mysqli->query($provfebrero);
$fprovfebrero = $rprovfebrero->fetch_assoc();
//
$provasisfebrero = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'asistencia' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-02-01' AND '2023-02-28'";
$rprovasisfebrero = $mysqli->query($provasisfebrero);
$fprovasisfebrero = $rprovasisfebrero->fetch_assoc();
//
$provresgfebrero = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'resguardo' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-02-01' AND '2023-02-28'";
$rprovresgfebrero = $mysqli->query($provresgfebrero);
$fprovresgfebrero = $rprovresgfebrero->fetch_assoc();
//marzo
$provmarzo = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-03-01' AND '2023-03-31'";
$rprovmarzo = $mysqli->query($provmarzo);
$fprovmarzo = $rprovmarzo->fetch_assoc();
//
$provasismarzo = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'asistencia' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-03-01' AND '2023-03-31'";
$rprovasismarzo = $mysqli->query($provasismarzo);
$fprovasismarzo = $rprovasismarzo->fetch_assoc();
//
$provresgmarzo = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'resguardo' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-03-01' AND '2023-03-31'";
$rprovresgmarzo = $mysqli->query($provresgmarzo);
$fprovresgmarzo = $rprovresgmarzo->fetch_assoc();
// abril
$provabril = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-04-01' AND '2023-04-30'";
$rprovabril = $mysqli->query($provabril);
$fprovabril = $rprovabril->fetch_assoc();
//
$resgasisabril = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'asistencia' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-04-01' AND '2023-04-30'";
$rresgasisabril = $mysqli->query($resgasisabril);
$fresgasisabril = $rresgasisabril->fetch_assoc();
//
$resgresgabril = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'resguardo' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-04-01' AND '2023-04-30'";
$rresgresgabril = $mysqli->query($resgresgabril);
$fresgresgabril = $rresgresgabril->fetch_assoc();
// mayo
$provmayo = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-05-01' AND '2023-05-31'";
$rprovmayo = $mysqli->query($provmayo);
$fprovmayo = $rprovmayo->fetch_assoc();
//
$provjunio = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-06-01' AND '2023-06-30'";
$rprovjunio = $mysqli->query($provjunio);
$fprovjunio = $rprovjunio->fetch_assoc();
//
$provjulio = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-07-01' AND '2023-07-31'";
$rprovjulio = $mysqli->query($provjulio);
$fprovjulio = $rprovjulio->fetch_assoc();
//
$provagosto = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-08-01' AND '2023-08-31'";
$rprovagosto = $mysqli->query($provagosto);
$fprovagosto = $rprovagosto->fetch_assoc();
//
$provseptiembre = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-09-01' AND '2023-09-30'";
$rprovseptiembre = $mysqli->query($provseptiembre);
$fprovseptiembre = $rprovseptiembre->fetch_assoc();
//
$provoctubre = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-10-01' AND '2023-10-31'";
$rprovoctubre = $mysqli->query($provoctubre);
$fprovoctubre = $rprovoctubre->fetch_assoc();
//
$provnoviembre = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-11-01' AND '2023-11-30'";
$rprovnoviembre = $mysqli->query($provnoviembre);
$fprovnoviembre = $rprovnoviembre->fetch_assoc();
//
$provdiciembre = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-12-01' AND '2023-12-31'";
$rprovdiciembre = $mysqli->query($provdiciembre);
$fprovdiciembre = $rprovdiciembre->fetch_assoc();
//
$resgasismayo = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'asistencia' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-05-01' AND '2023-05-31'";
$rresgasismayo = $mysqli->query($resgasismayo);
$fresgasismayo = $rresgasismayo->fetch_assoc();
//
$resgasisjunio = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'asistencia' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-06-01' AND '2023-06-30'";
$rresgasisjunio = $mysqli->query($resgasisjunio);
$fresgasisjunio = $rresgasisjunio->fetch_assoc();
//
$resgasisjulio = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'asistencia' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-07-01' AND '2023-07-31'";
$rresgasisjulio = $mysqli->query($resgasisjulio);
$fresgasisjulio = $rresgasisjulio->fetch_assoc();
//
$resgasisagosto = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'asistencia' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-08-01' AND '2023-08-31'";
$rresgasisagosto = $mysqli->query($resgasisagosto);
$fresgasisagosto = $rresgasisagosto->fetch_assoc();
//
$resgasisseptiembre = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'asistencia' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-09-01' AND '2023-09-30'";
$rresgasisseptiembre = $mysqli->query($resgasisseptiembre);
$fresgasisseptiembre = $rresgasisseptiembre->fetch_assoc();
//
$resgasisoctubre = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'asistencia' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-10-01' AND '2023-10-31'";
$rresgasisoctubre = $mysqli->query($resgasisoctubre);
$fresgasisoctubre = $rresgasisoctubre->fetch_assoc();
//
$resgasisnoviembre = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'asistencia' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-11-01' AND '2023-11-30'";
$rresgasisnoviembre = $mysqli->query($resgasisnoviembre);
$fresgasisnoviembre = $rresgasisnoviembre->fetch_assoc();
//
$resgasisdiciembre = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'asistencia' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-12-01' AND '2023-12-31'";
$rresgasisdiciembre = $mysqli->query($resgasisdiciembre);
$fresgasisdiciembre = $rresgasisdiciembre->fetch_assoc();
//
$resgresgmayo = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'resguardo' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-05-01' AND '2023-05-31'";
$rresgresgmayo = $mysqli->query($resgresgmayo);
$fresgresgmayo = $rresgresgmayo->fetch_assoc();
//
$resgresgjunio = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'resguardo' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-06-01' AND '2023-06-30'";
$rresgresgjunio = $mysqli->query($resgresgjunio);
$fresgresgjunio = $rresgresgjunio->fetch_assoc();
//
$resgresgjulio = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'resguardo' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-07-01' AND '2023-07-31'";
$rresgresgjulio = $mysqli->query($resgresgjulio);
$fresgresgjulio = $rresgresgjulio->fetch_assoc();
//
$resgresgagosto = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'resguardo' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-08-01' AND '2023-08-31'";
$rresgresgagosto = $mysqli->query($resgresgagosto);
$fresgresgagosto = $rresgresgagosto->fetch_assoc();
//
$resgresgseptiembre = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'resguardo' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-09-01' AND '2023-09-30'";
$rresgresgseptiembre = $mysqli->query($resgresgseptiembre);
$fresgresgseptiembre = $rresgresgseptiembre->fetch_assoc();
//
$resgresgoctubre = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'resguardo' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-10-01' AND '2023-10-31'";
$rresgresgoctubre = $mysqli->query($resgresgoctubre);
$fresgresgoctubre = $rresgresgoctubre->fetch_assoc();
//
$resgresgnoviembre = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'resguardo' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-11-01' AND '2023-11-30'";
$rresgresgnoviembre = $mysqli->query($resgresgnoviembre);
$fresgresgnoviembre = $rresgresgnoviembre->fetch_assoc();
//
$resgresgdiciembre = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'resguardo' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-12-01' AND '2023-12-31'";
$rresgresgdiciembre = $mysqli->query($resgresgdiciembre);
$fresgresgdiciembre = $rresgresgdiciembre->fetch_assoc();
//
$provtotal = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-01-01' AND '2023-12-31'";
$rprovtotal = $mysqli->query($provtotal);
$fprovtotal = $rprovtotal->fetch_assoc();
//
$resgasistotal = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'asistencia' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-01-01' AND '2023-12-31'";
$rresgasistotal = $mysqli->query($resgasistotal);
$fresgasistotal = $rresgasistotal->fetch_assoc();
//
$resgresgtotal = "SELECT COUNT(*) as t FROM `medidas`
WHERE tipo = 'provisional' AND clasificacion = 'resguardo' AND estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-01-01' AND '2023-12-31'";
$rresgresgtotal = $mysqli->query($resgresgtotal);
$fresgresgtotal = $rresgresgtotal->fetch_assoc();
//
$totalenero = "SELECT COUNT(*) as t FROM `medidas`
WHERE estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-01-01' AND '2023-01-31'";
$rtotalenero = $mysqli->query($totalenero);
$ftotalenero = $rtotalenero->fetch_assoc();
//
$totalfebrero = "SELECT COUNT(*) as t FROM `medidas`
WHERE estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-02-01' AND '2023-02-28'";
$rtotalfebrero = $mysqli->query($totalfebrero);
$ftotalfebrero = $rtotalfebrero->fetch_assoc();
//
$totalmarzo = "SELECT COUNT(*) as t FROM `medidas`
WHERE estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-03-01' AND '2023-03-31'";
$rtotalmarzo = $mysqli->query($totalmarzo);
$ftotalmarzo = $rtotalmarzo->fetch_assoc();
//
$totalabril = "SELECT COUNT(*) as t FROM `medidas`
WHERE estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-04-01' AND '2023-04-30'";
$rtotalabril = $mysqli->query($totalabril);
$ftotalabril = $rtotalabril->fetch_assoc();
//
$totalmayo = "SELECT COUNT(*) as t FROM `medidas`
WHERE estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-05-01' AND '2023-05-31'";
$rtotalmayo = $mysqli->query($totalmayo);
$ftotalmayo = $rtotalmayo->fetch_assoc();
//
$totaljunio = "SELECT COUNT(*) as t FROM `medidas`
WHERE estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-06-01' AND '2023-06-30'";
$rtotaljunio = $mysqli->query($totaljunio);
$ftotaljunio = $rtotaljunio->fetch_assoc();
//
$totaljulio = "SELECT COUNT(*) as t FROM `medidas`
WHERE estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-07-01' AND '2023-07-31'";
$rtotaljulio = $mysqli->query($totaljulio);
$ftotaljulio = $rtotaljulio->fetch_assoc();
//
$totalagosto = "SELECT COUNT(*) as t FROM `medidas`
WHERE estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-08-01' AND '2023-08-31'";
$rtotalagosto = $mysqli->query($totalagosto);
$ftotalagosto = $rtotalagosto->fetch_assoc();
//
$totalseptiembre = "SELECT COUNT(*) as t FROM `medidas`
WHERE estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-09-01' AND '2023-09-30'";
$rtotalseptiembre = $mysqli->query($totalseptiembre);
$ftotalseptiembre = $rtotalseptiembre->fetch_assoc();
//
$totaloctubre = "SELECT COUNT(*) as t FROM `medidas`
WHERE estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-10-01' AND '2023-10-31'";
$rtotaloctubre = $mysqli->query($totaloctubre);
$ftotaloctubre = $rtotaloctubre->fetch_assoc();
//
$totalnoviembre = "SELECT COUNT(*) as t FROM `medidas`
WHERE estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-11-01' AND '2023-11-30'";
$rtotalnoviembre = $mysqli->query($totalnoviembre);
$ftotalnoviembre = $rtotalnoviembre->fetch_assoc();
//
$totaldiciembre = "SELECT COUNT(*) as t FROM `medidas`
WHERE estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-12-01' AND '2023-12-31'";
$rtotaldiciembre = $mysqli->query($totaldiciembre);
$ftotaldiciembre = $rtotaldiciembre->fetch_assoc();
//
$total2023 = "SELECT COUNT(*) as t FROM `medidas`
WHERE estatus = 'EJECUTADA' AND date_ejecucion BETWEEN '2023-01-01' AND '2023-12-31'";
$rtotal2023 = $mysqli->query($total2023);
$ftotal2023 = $rtotal2023->fetch_assoc();
//

//
echo "<tr bgcolor = 'Lime'>";
echo "<td style='width: 430px; text-align:left'>"; echo "DEFINITIVAS (SUJETOS INCORPORADOS)"; echo "</td>";
echo "<td style='text-align:center'>"; echo $fdefenero['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fdeffebrero['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fdefmarzo['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fdefabril['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fdefmayo['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fdefjunio['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fdefjulio['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fdefagosto['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fdefseptiembre['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fdefoctubre['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fdefnoviembre['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fdefdiciembre['t']; echo "</td>";
echo "<td style='text-align:center' bgcolor = 'yellow'>"; echo $fdeftotal['t']; echo "</td>";
echo "</tr>";
//
echo "<tr>";
echo "<td style='text-align:center'>"; echo "ASISTENCIA"; echo "</td>";
echo "<td style='text-align:center'>"; echo $fdefasisenero['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fdefasisfebrero['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fdefasismarzo['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fdefasisabril['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fdefasismayo['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fdefasisjunio['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fdefasisjulio['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fdefasisagosto['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fdefasisseptiembre['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fdefasisoctubre['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fdefasisnoviembre['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fdefasisdiciembre['t']; echo "</td>";
echo "<td style='text-align:center' bgcolor = 'yellow'>"; echo $fdefasistotal['t']; echo "</td>";
echo "</tr>";
//
echo "<tr>";
echo "<td style='text-align:center'>"; echo "RESGUARDO"; echo "</td>";
echo "<td style='text-align:center'>"; echo $fdefresgenero ['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fdefresgfebrero['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fdefresgmarzo['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fdefresgabril['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fdefresgmayo['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fdefresgjunio['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fdefresgjulio['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fdefresgagosto['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fdefresgseptiembre['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fdefresgoctubre['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fdefresgnoviembre['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fdefresgdiciembre['t']; echo "</td>";
echo "<td style='text-align:center' bgcolor = 'yellow'>"; echo $fdefresgtotal['t']; echo "</td>";
echo "</tr>";
//
echo "<tr bgcolor = 'Lime'>";
echo "<td style='text-align:left'>"; echo "PROVISIONALES (PERSONAS PROPUESTAS)"; echo "</td>";
echo "<td style='text-align:center'>"; echo $fprovenero['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fprovfebrero['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fprovmarzo['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fprovabril['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fprovmayo['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fprovjunio['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fprovjulio['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fprovagosto['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fprovseptiembre['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fprovoctubre['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fprovnoviembre['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fprovdiciembre['t']; echo "</td>";
echo "<td style='text-align:center' bgcolor = 'yellow'>"; echo $fprovtotal['t']; echo "</td>";
echo "</tr>";
//
echo "<tr>";
echo "<td style='text-align:center'>"; echo "ASISTENCIA"; echo "</td>";
echo "<td style='text-align:center'>"; echo $fprovasisenero ['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fprovasisfebrero['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fprovasismarzo['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fresgasisabril['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fresgasismayo['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fresgasisjunio['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fresgasisjulio['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fresgasisagosto['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fresgasisseptiembre['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fresgasisoctubre['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fresgasisnoviembre['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fresgasisdiciembre['t']; echo "</td>";
echo "<td style='text-align:center' bgcolor = 'yellow'>"; echo $fresgasistotal['t']; echo "</td>";
echo "</tr>";
//
echo "<tr>";
echo "<td style='text-align:center'>"; echo "RESGUARDO"; echo "</td>";
echo "<td style='text-align:center'>"; echo $fprovasisenero ['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fprovresgfebrero['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fprovresgmarzo['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fresgresgabril['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $fresgresgmayo['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fresgresgjunio['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fresgresgjulio['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fresgresgagosto['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fresgresgseptiembre['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fresgresgoctubre['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fresgresgnoviembre['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $fresgresgdiciembre['t']; echo "</td>";
echo "<td style='text-align:center' bgcolor = 'yellow'>"; echo $fresgresgtotal['t']; echo "</td>";
echo "</tr>";
//
echo "<tr bgcolor = 'yellow'>";
echo "<td style='text-align:right'>"; echo "TOTAL DE MEDIDAS"; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftotalenero['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftotalfebrero['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftotalmarzo['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftotalabril['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftotalmayo['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $ftotaljunio['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $ftotaljulio['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $ftotalagosto['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $ftotalseptiembre['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $ftotaloctubre['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $ftotalnoviembre['t']; echo "</td>";
// echo "<td style='text-align:center'>"; echo $ftotaldiciembre['t']; echo "</td>";
echo "<td style='text-align:center'>"; echo $ftotal2023['t']; echo "</td>";
echo "</tr>";
?>
