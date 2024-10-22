var dom = document.getElementById('chart-container');
var myChart = echarts.init(dom, 'dark', {
  renderer: 'canvas',
  useDirtyRect: false
});



var app = {};

fetch('../../Backend/graficas/index.php')
  .then(response => response.json()) 
  .then(data => {




    const pieData = data.departamentos.map((nombre, index) => ({
      value: data.totales[index],
      name: nombre
      
    }));
    
 
    
    var option = {
      title: {
        text: 'Distribución de Empleados por Departamento',
        top: 'top',
        left: 'center',
        textStyle: {
          color: '#8fc8ff',
          fontSize: 20,
          fontWeight: 'bold'
        },
        padding: [15, 0, 0, 0]
      },
      xAxis: {
        type: 'category',
        data: data.departamentos,
        axisLabel: {
          interval: 0, 
          rotate: 30, 
          fontSize: 12, 
          color: '#ffffff', 
          formatter: function (value) {
            return value.length > 10 ? value.substring(0, 10) + '...' : value; 
          }
        },
        axisLine: {
          lineStyle: {
            color: '#ffffff' 
          }
        }
      },
      yAxis: {
        type: 'value',
    
        axisLabel: {
          fontSize: 12, 
          color: '#ffffff' 
        },
        axisLine: {
          lineStyle: {
            color: '#ffffff' 
          }
        }
      },
      series: [
        {
          data: data.totales,
          type: 'bar',
          color: '#4A90E2',
          label: {
            show: true,
            position: 'top', 
            fontSize: 12,
            color: '#ffffff' 
          },
          itemStyle: {
            emphasis: {
             
              color: '#7EC3E5'
            },
            borderColor: '#2C3E50', 
            borderWidth: 1, 
            shadowColor: 'rgba(0, 0, 0, 0.5)', 
            shadowBlur: 10 
          },
          animationDuration: 1000 
        }
      ],
      tooltip: {
        trigger: 'axis',
        backgroundColor: '#333', 
        borderColor: '#999', 
        borderWidth: 1,
        formatter: function (params) {
          var name = params[0].name;
          var value = params[0].value;
          return `<strong style="color: #ffffff;">${name}</strong>: ${value} empleados`; 
        }
      },
      grid: {
        left: '10%', 
        right: '10%',
        bottom: '15%',
        top: '20%'
      }
    };

    if (option && typeof option === 'object') {
      myChart.setOption(option);
    }

    window.addEventListener('resize', myChart.resize);
  })
  .catch(error => {
    console.error('Error al obtener los datos:', error); 
  }); 
