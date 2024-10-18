<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            INFORME GERENCIA COMERCIAL
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <!-- Botón para Pantalla Completa, centrado con Bootstrap -->
                <div class="d-flex justify-content-center mb-4">
                    <button onclick="goFullScreen()" class="btn btn-primary btn-lg shadow-lg">
                        <i class="bi bi-arrows-fullscreen"></i> Pantalla Completa
                    </button>
                </div>

                <!-- Iframe de Power BI -->
                <iframe id="dashboardIframe" title="Dashboard_Comercial_V3" width="1140" height="541.25" src="https://app.powerbi.com/reportEmbed?reportId=991b0e01-0a7e-4a3d-86d8-21968e9e4d3e&autoAuth=true&ctid=dd505be5-ec69-47f5-92df-caa55febf5fa" frameborder="0" allowFullScreen="true"></iframe>
            </div>
        </div>
    </div>

    <!-- Script para Pantalla Completa -->
    <script>
        function goFullScreen() {
            var iframe = document.getElementById("dashboardIframe");
            if (iframe.requestFullscreen) {
                iframe.requestFullscreen();
            } else if (iframe.mozRequestFullScreen) { // Firefox
                iframe.mozRequestFullScreen();
            } else if (iframe.webkitRequestFullscreen) { // Chrome, Safari and Opera
                iframe.webkitRequestFullscreen();
            } else if (iframe.msRequestFullscreen) { // IE/Edge
                iframe.msRequestFullscreen();
            }
        }
    </script>
</x-app-layout>
