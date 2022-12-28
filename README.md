# postalcodes
Postal codes, retrieve settlements associates to postal code for country Mexico

The data is from postalservices of Mexico from the page 
https://www.correosdemexico.gob.mx/SSLServicios/ConsultaCP/CodigoPostal_Exportar.aspx

for Install:

run php artisan migrate

CPdescarga.txt is an file with postal codes cvs, the delimiter is '|'. Is in the root of project

the The endpoint -> POST api/data/save get an file in var zipdata
result -> generate jobs for processing the data.

run php artisan queue:work

The endpoint -> GET api/zip-codes/{zip_code}
result with zip_code=01210 -> {"zip_code":"01210","locality":"CIUDAD DE MEXICO","federal_entity":{"key":9,"name":"CIUDAD DE MEXICO","code":null},"settlements":[{"key":82,"name":"SANTA FE","zone_type":"URBANO","settlement_type":{"name":"Pueblo"}}],"municipality":{"key":10,"name":"ALVARO OBREGON"}}




