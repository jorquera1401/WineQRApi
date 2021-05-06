<div>
    {{-- The Master doesn't talk, he acts. --}}
 
    <div class="card">
        <div class="card-header header-informe"><h3>Gráfico de Bodega</h3></div>
    </div>
    <div class="card-body">
        <canvas id="pie-chart"></canvas>
    </div>
    <div class="card">
        <div class="card-header header-grafico"><h3>Gráfico de Almacén de Fruta</h3></div>
        <div class="card-body">
            <canvas id="almacen-chart"></canvas>
        </div>
    </div>
    
    <script>

        function graficoAlmacen(cData,canvas){
            var dataBodega = {
                labels: cData.label,
                datasets:[
                   {
                       label:  "Temperatura",
                       data: cData.temperaturaData,
                       backgroundColor:[       
                           "#e0ac08",
                       ],
                       borderColor:[
                           "#CB252B",
                       ],
                       borderWidth : [1,1,1,1,1,1,1]
                   },
                   {
                       label: "Humedad",
                       data: cData.humedadData,
                       backgroundColor:[
                           "#3171e0"
                       ],
                       borderColor:[
                           "#CB252B",
                       ],
                       borderWidth:[1,1,1,1,1,1]
                   }
                ]
            };  
            var options = {
                responsive : true,
                title:{
                    display:true,
                    position:"top",
                    text:"Temperatura y Humedad - Almacén",
                    fontSize:18,
                    fontColor:"#111"
                },
                legend:{
                    display : true,
                    position:"bottom",
                    labels:{
                        fontColor:"#333",
                        fontSize:16
                    }
                }
            };

            var grafico_temperatura = new Chart(canvas,{
                type:"line",
                data:dataBodega,
                options:options
            });
            
        }

        function graficoBodega(cData,canvas){
            var dataBodega = {
                labels: cData.label,
                datasets:[
                   {
                       label:  "Temperatura",
                       data: cData.data,
                       backgroundColor:[       
                           "#eb445a",
                       ],
                       borderColor:[
                           "#CB252B",
                       ],
                       borderWidth : [1,1,1,1,1,1,1]
                   },
                   {
                       label: "Humedad",
                       data: cData.humedad,
                       backgroundColor:[
                           "#3dc2ff"
                       ],
                       borderColor:[
                           "#CB252B",
                       ],
                       borderWidth:[1,1,1,1,1,1]
                   }
                ]
            };  
            var options = {
                responsive : true,
                title:{
                    display:true,
                    position:"top",
                    text:"Temperatura y Humedad - Bodega",
                    fontSize:18,
                    fontColor:"#111"
                },
                legend:{
                    display : true,
                    position:"bottom",
                    labels:{
                        fontColor:"#333",
                        fontSize:16
                    }
                }
            };

            var grafico_temperatura = new Chart(canvas,{
                type:"line",
                data:dataBodega,
                options:options
            });

        }
        $(function(){
            var cData = JSON.parse('<?php echo $dataBodega ?? '';?>');
            var cDataAlmacen = JSON.parse('<?php echo $dataAlmacen;?>');
            console.log(cDataAlmacen);
            var ctx= $("#pie-chart");
            var cti = $('#almacen-chart');
            
            graficoBodega(cData,ctx);
            graficoAlmacen(cDataAlmacen,cti);
 
             
        });
    </script>

</div>
