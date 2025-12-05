<h1 class="mb-4">Dashboard</h1>

<div class="row">

    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3><?= $dados["total_reservas"]; ?></h3>
                <p>Total de Reservas</p>
            </div>
            <div class="icon"><i class="fas fa-calendar-alt"></i></div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $dados["total_pessoas"]; ?></h3>
                <p>Total de Pessoas</p>
            </div>
            <div class="icon"><i class="fas fa-users"></i></div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $dados["almoco"]; ?></h3>
                <p>Almoço</p>
            </div>
            <div class="icon"><i class="fas fa-utensils"></i></div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?= $dados["jantar"]; ?></h3>
                <p>Jantar</p>
            </div>
            <div class="icon"><i class="fas fa-moon"></i></div>
        </div>
    </div>

</div>

<!-- Gráficos -->
<div class="row">

    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white">Reservas por Dia</div>
            <div class="card-body">
                <canvas id="grafDias"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-info text-white">Reservas por Horário</div>
            <div class="card-body">
                <canvas id="grafHoras"></canvas>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
let diasLabels = <?= json_encode(array_column($dados["graf_dias"], "data")); ?>;
let diasValues = <?= json_encode(array_column($dados["graf_dias"], "reservas")); ?>;

let ctx1 = document.getElementById('grafDias').getContext('2d');
new Chart(ctx1, {
    type: 'line',
    data: {
        labels: diasLabels,
        datasets: [{
            label: 'Reservas',
            data: diasValues,
            borderColor: 'blue',
            fill: false
        }]
    }
});

// Gráfico por hora
let horasLabels = <?= json_encode(array_column($dados["graf_horas"], "hora")); ?>;
let horasValues = <?= json_encode(array_column($dados["graf_horas"], "qtd")); ?>;

let ctx2 = document.getElementById('grafHoras').getContext('2d');
new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: horasLabels,
        datasets: [{
            label: 'Reservas',
            data: horasValues,
            backgroundColor: 'teal'
        }]
    }
});
</script>
