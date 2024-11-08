// Contenedor para la gráfica de distribución de empleados por departamento
var dom1 = document.getElementById('chart-container');
var myChart1 = echarts.init(dom1, 'dark', {
  renderer: 'canvas',
  useDirtyRect: false
});

// Contenedor para la nueva gráfica de empleados activos
var dom2 = document.getElementById('main');
var graficaIngreso = echarts.init(dom2, 'dark', {
  renderer: 'canvas',
  useDirtyRect: false
});

fetch('../../Backend/graficas/index.php')
  .then(response => response.json()) 
  .then(data => {
    // Datos para la gráfica de Distribución de Empleados por Departamento
    var option1 = {
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
          name: 'Empleados por Departamento',
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

    myChart1.setOption(option1);

    // Nueva gráfica de Empleados Activos
    const totalEmpleados = data.totales.reduce((a, b) => a + b, 0); // Calcula el total de empleados sumando los totales

    var opcionesEmpleadosActivos = {
      title: {
        text: 'Empleados Activos',
        left: 'center',
        textStyle: {
          color: '#8fc8ff',
          fontSize: 20,
          fontWeight: 'bold'
        },
        padding: [15, 0, 0, 0]
      },
      tooltip: {
        trigger: 'item',
        formatter: '{b}: {c} empleados'
      },
      series: [{
        type: 'pie',
        radius: '50%',
        data: [
          { value: data.empleadosActivos, name: 'Activos' },
          { value: totalEmpleados - data.empleadosActivos, name: 'Inactivos' }
        ],
        label: {
          color: '#ffffff',
          fontSize: 14
        },
        color: ['#5e56fe', '#9da8ff'],
        itemStyle: {
          emphasis: {
            color: '#c2cbff'
          }
        }
      }]
    };

    graficaIngreso.setOption(opcionesEmpleadosActivos);

    // Ajustar ambas gráficas cuando la ventana cambie de tamaño
    window.addEventListener('resize', () => {
      myChart1.resize();
      graficaIngreso.resize(); 
    });
  })
  .catch(error => {
    console.error('Error al obtener los datos:', error); 
  });
