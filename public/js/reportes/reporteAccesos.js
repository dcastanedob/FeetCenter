(function( $ ){


   /*
    * Handle input. Call public functions and initializers
    */

    $.fn.reporteAccesos = function(data){
        var _this = $(this);
        var plugin = _this.data('reporteAccesos');

        /*Inicializado ?*/
        if (!plugin) {

            plugin = new $.reporteAccesos(this, data);

            _this.data('reporteAccesos', plugin);

            return plugin;
        /*Si ya fue inizializado regresamos el plugin*/
        }else{
            return plugin;
        }

    };

    /*
    * Plugin Constructor
    */

    $.reporteAccesos = function(container, options){

        var plugin = this;

        /*
        * Default Values
        */

       var defaults = {

       };

       /*
        * Important Components
        */
        var $container = $(container);
        var $tableAccesos = $container.find('.table-accesos');

        var settings;
        var $table1;

        /*
        * Private methods
        */


       var filter = function(from,to){

           var empleados_select = $container.find("select[name=idempleado]").multipleSelect('getSelects');
           if(typeof from == 'undefined' && typeof to == 'undefined'){
               //El origen de los tiempo
               from = moment('19-08-1990','DD-MM-YYYY');
               to = moment();
           }

           $tableAccesos.find('tr').remove();

           if(typeof $table1 != 'undefined'){
                $table1.clear();
                $table1.destroy();
            }

           $.ajax({
               method:'POST',
               dataType:'json',
               url:'/reportes/filteraccesos',
               async:false,
               data:{empleados:empleados_select,from:from.format('YYYY-MM-DD'),to:to.format('YYYY-MM-DD')},
               success:function(data){

                   //Las cabeceras de nuestras tablas
                   var thead_servicios = $('<tr>');
                   thead_servicios.append('<th>Empleado</th>');
                   thead_servicios.append('<th>Inicio Sesión</th>');
                   thead_servicios.append('<th>Fin Sesión</th>');
                   thead_servicios.append('<th>Ubicación</th>');



                   $tableAccesos.find('thead').append(thead_servicios);


                   /*
                    * SERVICIOS
                    */

                   if(data.logs.length > 0){



                        $.each(data.logs,function(log){

                            var loginlog_fechafin = this.loginlog_fechafin != null ?  this.loginlog_fechafin :  'N/D'
                            var ubicacion = ( this.loginlog_geo.city != null && this.loginlog_geo.region ) ?  this.loginlog_geo.city+', '+this.loginlog_geo.region  :  'N/D'


                            var tr = $('<tr>')
                            tr.append('<td>'+this.empleado_nombre.toUpperCase()+'</td>');
                            tr.append('<td>'+this.loginlog_fechainicio.toUpperCase()+'</td>');
                            tr.append('<td>'+loginlog_fechafin.toUpperCase()+'</td>');
                            tr.append('<td>'+ubicacion.toUpperCase()+'</td>');


                            $tableAccesos.find('tbody').append(tr);

                        });


                    }



                   /*
                    * DATATABLE
                    */
                   $.ajax({
                        url: '/json/lang_es_datatable.json',
                        dataType: 'json',
                        async:false,
                        success: function(data){
                            $table1 = $tableAccesos.DataTable({
                                language:data,
                            });

                        },
                    });
               }
           })


       }

       /*
        * Public methods
        */

        plugin.init = function(){

            //Inicializamos nuestro multiple select
            $container.find("select[name=idempleado]").multipleSelect({
                onClick : function(){
                    filter();
                },
                onCheckAll: function(){
                    filter();
                },
            });

            /*
             * El evento filter
             */

            //Inicializamos nuestros calendarios del filtro de fechas
            var pickdateFrom = $container.find('input[name=filter_from]').pickadate({
                monthsFull: [ 'enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre' ],
                monthsShort: [ 'ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic' ],
                weekdaysFull: [ 'domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado' ],
                weekdaysShort: [ 'dom', 'lun', 'mar', 'mié', 'jue', 'vie', 'sáb' ],
                today: 'hoy',
                clear: 'borrar',
                close: 'cerrar',
                firstDay: 1,
                format: 'd !de mmmm !de yyyy',
                formatSubmit: 'yyyy/mm/dd',
                selectYears: true,
                selectMonths: true,
                selectYears: 25,
            });

            //Inicializamos nuestros calendarios del filtro de fechas
            var pickdateTo= $container.find('input[name=filter_to]').pickadate({
                monthsFull: [ 'enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre' ],
                monthsShort: [ 'ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic' ],
                weekdaysFull: [ 'domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado' ],
                weekdaysShort: [ 'dom', 'lun', 'mar', 'mié', 'jue', 'vie', 'sáb' ],
                today: 'hoy',
                clear: 'borrar',
                close: 'cerrar',
                firstDay: 1,
                format: 'd !de mmmm !de yyyy',
                formatSubmit: 'yyyy/mm/dd',
                selectYears: true,
                selectMonths: true,
                selectYears: 25,
            });

            $container.find('button#filterbydate').on('click',function(){

                var empty = false;

                $('#filter_container input:visible').removeClass('input-error');

                $('#filter_container input:visible').each(function(){
                    if($(this).val() == ""){
                        empty = true;
                        $(this).addClass('input-error');
                    }
                });

                if(!empty){
                   var from = moment($container.find('input[name=filter_from_submit]').val(),'YYYY-MM-DD');
                   var to =  moment($container.find('input[name=filter_to_submit]').val(),'YYYY-MM-DD');

                    filter(from,to);

                }

            });

        }

        /*
        * Plugin initializing
        */

        plugin.init();

    }



})( jQuery );
