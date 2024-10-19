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
          interval: 0, // Muestra todas las etiquetas
          rotate: 30, // Rota las etiquetas para mejorar la legibilidad
          fontSize: 12, // Ajusta el tamaño de las etiquetas
          color: '#ffffff', // Color de las etiquetas
          formatter: function (value) {
            return value.length > 10 ? value.substring(0, 10) + '...' : value; // Corta si es demasiado largo
          }
        },
        axisLine: {
          lineStyle: {
            color: '#ffffff' // Color de la línea del eje X
          }
        }
      },
      yAxis: {
        type: 'value',
        // name: 'Número de Empleados',
        axisLabel: {
          fontSize: 12, // Ajusta el tamaño de las etiquetas del eje Y
          color: '#ffffff' // Color de las etiquetas
        },
        axisLine: {
          lineStyle: {
            color: '#ffffff' // Color de la línea del eje Y
          }
        }
      },
      series: [
        {
          data: data.totales,
          type: 'bar',
          color: '#4A90E2',
          label: {
            show: true, // Muestra etiquetas en las barras
            position: 'top', // Coloca las etiquetas encima de las barras
            fontSize: 12,
            color: '#ffffff' // Cambia el color de las etiquetas para mejor visibilidad
          },
          itemStyle: {
            emphasis: {
              // Estilo al pasar el mouse
              color: '#7EC3E5'
            },
            borderColor: '#2C3E50', // Color del borde de las barras
            borderWidth: 1, // Ancho del borde de las barras
            shadowColor: 'rgba(0, 0, 0, 0.5)', // Sombra de las barras
            shadowBlur: 10 // Difuminado de la sombra
          },
          animationDuration: 1000 // Duración de la animación al cargar
        }
      ],
      tooltip: {
        trigger: 'axis',
        backgroundColor: '#333', // Color de fondo del tooltip
        borderColor: '#999', // Color del borde del tooltip
        borderWidth: 1,
        formatter: function (params) {
          var name = params[0].name;
          var value = params[0].value;
          return `<strong style="color: #ffffff;">${name}</strong>: ${value} empleados`; 
        }
      },
      grid: {
        left: '10%', // Ajusta los márgenes del gráfico para evitar que las etiquetas se corten
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
    console.error('Error al obtener los datos:', error); // Manejo de errores
  }); 
