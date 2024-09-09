async function loadContent() {
    try {
      const response = await fetch('./index.html');
      if (!response.ok) throw new Error('Error al cargar index.html');
  
      const text = await response.text();
      const tempDocument = new DOMParser().parseFromString(text, 'text/html');
  
     
      const loadElement = (selector, targetId) => {
        const element = tempDocument.querySelector(selector);
        const targetElement = document.getElementById(targetId);
        if (element && targetElement) {
          targetElement.innerHTML = element.outerHTML;
        } else {
          console.error(`No se encontraron los elementos: ${selector} -> ${targetId}`);
        }
      };
  
     
      loadElement('#barra-de-navegacion', 'navegacion');
      loadElement('#logo-sidebar', 'aside-contenido');

  
   
      tempDocument.querySelectorAll('script').forEach(script => {
        const newScript = document.createElement('script');
        if (script.src) {
          newScript.src = script.src;
        } else {
          newScript.textContent = script.textContent;
        }
        document.body.appendChild(newScript);
      });
  
    } catch (error) {
      console.error('Error en la solicitud:', error);
    }
  }
  
  loadContent();
  