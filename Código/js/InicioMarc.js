function openTab(tabName) {
    const tabContents = document.querySelectorAll('.tab-content');
    const tabButtons = document.querySelectorAll('.tab-button');

    // Quitar la clase 'active' de todas las pestañas y botones
    tabContents.forEach(tabContent => {
        tabContent.classList.remove('active');
    });

    tabButtons.forEach(tabButton => {
        tabButton.classList.remove('active');
    });

    // Agregar la clase 'active' al contenido y botón seleccionados
    document.getElementById(tabName).classList.add('active');
    document.querySelector(`.tab-button[onclick="openTab('${tabName}')"]`).classList.add('active');
}
