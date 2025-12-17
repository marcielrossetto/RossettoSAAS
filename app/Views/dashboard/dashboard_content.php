<h1 class="mb-4">Dashboard</h1>

<div class="row">

    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3><?= $dados['total'] ?? 0 ?></h3>
                <p>Total de Reservas</p>
            </div>
            <div class="icon"><i class="fas fa-calendar-alt"></i></div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $dados['pessoas'] ?? 0 ?></h3>
                <p>Total de Pessoas</p>
            </div>
            <div class="icon"><i class="fas fa-users"></i></div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $dados['almoco'] ?? 0 ?></h3>
                <p>Almoço</p>
            </div>
            <div class="icon"><i class="fas fa-utensils"></i></div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?= $dados['jantar'] ?? 0 ?></h3>
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
            <div class="card-header bg-primary text-white">
                Reservas por Dia
            </div>
            <div class="card-body">
                <canvas id="grafDias"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-info text-white">
                Reservas por Horário
            </div>
            <div class="card-body">
                <canvas id="grafHoras"></canvas>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
/* === Gráfico por dia === */
const diasLabels = <?= json_encode(array_column($dados['graf_dias'] ?? [], 'data')) ?>;
const diasValues = <?= json_encode(array_column($dados['graf_dias'] ?? [], 'reservas')) ?>;

const ctx1 = document.getElementById('grafDias');
if (ctx1) {
    new Chart(ctx1, {
        type: 'line',
        data: {
            labels: diasLabels,
            datasets: [{
                label: 'Reservas',
                data: diasValues,
                borderColor: '#0d6efd',
                tension: 0.3,
                fill: false
            }]
        }
    });
}

/* === Gráfico por horário === */
const horasLabels = <?= json_encode(array_column($dados['graf_horas'] ?? [], 'hora')) ?>;
const horasValues = <?= json_encode(array_column($dados['graf_horas'] ?? [], 'qtd')) ?>;

const ctx2 = document.getElementById('grafHoras');
if (ctx2) {
    new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: horasLabels,
            datasets: [{
                label: 'Reservas',
                data: horasValues,
                backgroundColor: '#20c997'
            }]
        }
    });
}
</script>
