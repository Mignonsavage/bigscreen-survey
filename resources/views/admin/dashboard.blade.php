
@extends('layouts.admin')

@section('title', 'Tableau de Bord - Administration')

@section('content')
    <h1 class="text-4xl font-bold text-gray-800 mb-8">Tableau de Bord</h1>

    <!-- Section Équipement -->
    <h2 class="text-2xl font-semibold text-gray-700 mb-4">Équipement & Utilisation</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="font-semibold text-center mb-4">Marques de casque VR</h3>
            <canvas id="headsetChart"></canvas>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="font-semibold text-center mb-4">Magasins d'application</h3>
            <canvas id="storeChart"></canvas>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="font-semibold text-center mb-4">Utilisation principale</h3>
            <canvas id="usageChart"></canvas>
        </div>
    </div>

    <!-- Section Qualité -->
    <h2 class="text-2xl font-semibold text-gray-700 mb-4">Qualité perçue</h2>
    <div class="grid grid-cols-1">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="w-full lg:w-2/3 mx-auto">
                <canvas id="qualityChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Inclusion de Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Couleurs pour les graphiques
        const chartColors = [
            '#3B82F6', '#10B981', '#F59E0B', '#EF4444', '#8B5CF6',
            '#38BDF8', '#22C55E', '#F97316', '#EC4899', '#6366F1'
        ];

        // Graphique 1: Headsets
        const headsetCtx = document.getElementById('headsetChart').getContext('2d');
        const headsetData = @json($headsetData);
        new Chart(headsetCtx, {
            type: 'pie',
            data: {
                labels: Object.keys(headsetData),
                datasets: [{
                    data: Object.values(headsetData),
                    backgroundColor: chartColors,
                }]
            },
            options: { responsive: true, maintainAspectRatio: true }
        });

        // Graphique 2: Stores
        const storeCtx = document.getElementById('storeChart').getContext('2d');
        const storeData = @json($storeData);
        new Chart(storeCtx, {
            type: 'pie',
            data: {
                labels: Object.keys(storeData),
                datasets: [{
                    data: Object.values(storeData),
                    backgroundColor: chartColors,
                }]
            },
            options: { responsive: true, maintainAspectRatio: true }
        });

        // Graphique 3: Usage
        const usageCtx = document.getElementById('usageChart').getContext('2d');
        const usageData = @json($usageData);
        new Chart(usageCtx, {
            type: 'pie',
            data: {
                labels: Object.keys(usageData),
                datasets: [{
                    data: Object.values(usageData),
                    backgroundColor: chartColors,
                }]
            },
            options: { responsive: true, maintainAspectRatio: true }
        });

        // Graphique 4: Qualité
        const qualityCtx = document.getElementById('qualityChart').getContext('2d');
        const qualityData = @json($qualityData);
        new Chart(qualityCtx, {
            type: 'radar',
            data: {
                labels: Object.keys(qualityData).map(label => label.replace('Combien donnez-vous de point pour ', '').replace(' sur Bigscreen ?', '')),
                datasets: [{
                    label: 'Note moyenne (sur 5)',
                    data: Object.values(qualityData),
                    backgroundColor: 'rgba(59, 130, 246, 0.2)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                scales: {
                    r: {
                        angleLines: { display: true },
                        suggestedMin: 0,
                        suggestedMax: 5,
                        pointLabels: {
                            font: { size: 12 }
                        }
                    }
                }
            }
        });
    </script>
@endsection


