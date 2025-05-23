
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Claims Statistics by Subject - Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/reset.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
      body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.6;
        margin: 0;
        padding: 0;
        background-color: #efe9d5;
        color: #27445D;
      }
      .container {
        width: 90%;
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        border: 1px solid #EFE9D5;
      }
      header {
        background-color: #27445D;
        color:  #FBFBFB;
        padding: 1rem;
        text-align: center;
        border-radius: 5px 5px 0 0;
        margin-bottom: 20px;
      }
      h1,
      h2,
      h3 {
        color: #27445D;
      }
      .portal-links {
        display: flex;
        justify-content: center;
        padding: 15px;
        background-color: #27445D;
        margin-bottom: 20px;
        border-radius: 4px;
      }
      .portal-links a {
        color: #FBFBFB;
        text-decoration: none;
        padding: 10px 20px;
        margin: 0 10px;
        border-radius: 4px;
        background-color: #497074;
        transition: all 0.3s ease;
      }
      .portal-links a.active {
        background-color: #718882;
        font-weight: bold;
      }
      .portal-links a:hover {
        background-color: #718882;
        transform: translateY(-2px);
      }
      .nav-links {
        display: flex;
        justify-content: space-between;
        background-color: #FBFBFB;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 20px;
        border: 1px solid #EFE9D5;
      }
      .nav-links a {
        color: #27445D;
        text-decoration: none;
        padding: 8px 12px;
        border-radius: 4px;
        transition: background-color 0.3s;
      }
      .nav-links a:hover {
        background-color: #EFE9D5;
      }
      .admin-badge {
        background-color: #497074;
        color: #FBFBFB;
        padding: 3px 8px;
        border-radius: 3px;
        font-size: 14px;
        margin-left: 10px;
      }
      .btn {
        display: inline-block;
        background-color: #718882;
        color: white;
        padding: 8px 15px;
        border: none;
        border-radius: 4px;
        text-decoration: none;
        cursor: pointer;
        font-size: 15px;
        transition: all 0.3s ease;
      }

 .btn-view {
                background-color: #497074;
            }
            .btn-view:hover {
                background-color: #718882;
            }
           
      .btn:hover {
        background-color: #27445D;
        transform: translateY(-2px);
        box-shadow: 0 3px 8px rgba(39, 68, 93, 0.2);
      }      .stats-container {
        margin-top: 20px;
      }
      .stats-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
      }
      .stats-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #2C3E50;
      }
      .stats-card {
        background-color: #FFFFFF;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 2px 5px rgba(160, 174, 192, 0.1);
        border: 1px solid #E2E8F0;
        transition: transform 0.2s ease;
      }
      .stats-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 10px rgba(160, 174, 192, 0.2);
      }
      .stats-card h3 {
        font-size: 1.3rem;
        margin-bottom: 15px;
        color: #4A5568;
        border-bottom: 2px solid #EDF2F7;
        padding-bottom: 10px;
      }
      .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
      }
      .stats-summary {
        background-color: #F7FAFC;
        border-radius: 6px;
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid #E2E8F0;
      }
      .stats-summary h3 {
        color: #4A5568;
        margin-bottom: 10px;
      }
      .stats-numbers {
        display: flex;
        justify-content: space-between;
        margin-top: 15px;
      }
      .stats-number-item {
        text-align: center;
        flex: 1;
        padding: 10px;
        border-radius: 6px;
        background-color: #EDF2F7;
      }
      .stats-number-item.open {
        background-color: #EBF8FF;
      }
      .stats-number-item.closed {
        background-color: #F0FFF4;
      }
      .stats-number-value {
        font-size: 24px;
        font-weight: 700;
        color: #2D3748;
      }
      .stats-number-label {
        font-size: 14px;
        color: #718096;
      }
      .stats-bar {
        height: 24px;
        border-radius: 12px;
        background-color: #E2E8F0;
        margin: 15px 0;
        overflow: hidden;
        display: flex;
      }
      .stats-bar-open {
        background-color: #4299E1;
        height: 100%;
      }
      .stats-bar-closed {
        background-color: #48BB78;
        height: 100%;
      }
      .stats-bar-legend {
        display: flex;
        justify-content: center;
        margin-top: 10px;
        font-size: 14px;
      }
      .legend-item {
        display: flex;
        align-items: center;
        margin: 0 10px;
      }
      .legend-color {
        width: 16px;
        height: 16px;
        border-radius: 4px;
        margin-right: 5px;
      }
      .legend-color.open {
        background-color: #4299E1;
      }
      .legend-color.closed {
        background-color: #48BB78;
      }
      .empty-state {
        text-align: center;
        padding: 30px;
        color: #718096;
        background-color: #F7FAFC;
        border-radius: 8px;
        margin-top: 30px;
        border: 1px dashed #CBD5E0;
      }

      .chart-container {
        background-color: #efe9d5;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(160, 174, 192, 0.1);
        padding: 20px;
        margin-bottom: 30px;
        border: 1px solid #E2E8F0;
      }

      .chart-row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-bottom: 30px;
      }

      .chart-column {
        flex: 1;
        min-width: 300px;
      }

      .pie-chart-container {
        height: 300px;
        position: relative;
      }

      .chart-title {
        font-size: 1.2rem;
        margin-bottom: 15px;
        color: #4A5568;
        text-align: center;
      }
    </style>
      </head>
  <body>
    <div class="container">
      <header>
        <h1>Claims Statistics
          <span class="admin-badge">Admin</span>
        </h1>
        <p>Analysis of claims by subject</p>
      </header>

      <div class="portal-links">
        <a href="index.php">User Portal</a>
        <a href="index.php?controller=AdminClaim" class="active">Admin Portal</a>
      </div>

      <div class="nav-links">
        <a href="index.php?controller=AdminClaim">Admin Home</a>
        <a href="index.php?controller=AdminClaim&action=index">Manage Claims</a>
        <a href="index.php?controller=AdminClaim&action=stats">Claims Statistics</a>
      </div>

      <section class="stats-container">
        <div class="stats-header">
          <h2 class="stats-title">Claims Statistics by Subject</h2>
        </div>

        <?php if (empty($subjectStats)): ?>
          <div class="empty-state">
            <h3>No statistics available</h3>
            <p>There are no claims or subjects in the system yet.</p>
          </div>
        <?php else: ?>
          <div class="stats-summary">
            <h3>Overview</h3>
            <?php
            $totalClaims = 0;
            $totalOpenClaims = 0;
            $totalClosedClaims = 0;

            foreach ($subjectStats as $stat) {
              $totalClaims += $stat['total_claims'];
              $totalOpenClaims += $stat['open_claims'];
              $totalClosedClaims += $stat['closed_claims'];
            }
            ?>
            <div class="stats-numbers">
              <div class="stats-number-item total">
                <div class="stats-number-value"><?= $totalClaims ?></div>
                <div class="stats-number-label">Total Claims</div>
              </div>
              <div class="stats-number-item open">
                <div class="stats-number-value"><?= $totalOpenClaims ?></div>
                <div class="stats-number-label">Open Claims</div>
              </div>
              <div class="stats-number-item closed">
                <div class="stats-number-value"><?= $totalClosedClaims ?></div>
                <div class="stats-number-label">Closed Claims</div>
              </div>
            </div>

            <?php if ($totalClaims > 0): ?>
              <div class="stats-bar">
                <div class="stats-bar-open" style="width: <?= ($totalOpenClaims / $totalClaims) * 100 ?>%;"></div>
                <div class="stats-bar-closed" style="width: <?= ($totalClosedClaims / $totalClaims) * 100 ?>%;"></div>
              </div>
              <div class="stats-bar-legend">
                <div class="legend-item">
                  <div class="legend-color open"></div>
                  <span>Open</span>
                </div>
                <div class="legend-item">
                  <div class="legend-color closed"></div>
                  <span>Closed</span>
                </div>
              </div>
            <?php endif; ?>
          </div>

          <!-- Added new chart section -->
          <div class="chart-row">
            <div class="chart-column">
              <div class="chart-container">
                <h3 class="chart-title">Claims Distribution by Subject</h3>
                <div class="pie-chart-container">
                  <canvas id="claimsDistributionChart"></canvas>
                </div>
              </div>
            </div>
          </div>

          <div
            class="stats-grid">
            <?php foreach ($subjectStats as $stat): ?>
              <div class="stats-card">
                <h3><?= htmlspecialchars($stat['subject_title']) ?></h3>
                <div class="stats-numbers">
                  <div class="stats-number-item total">
                    <div class="stats-number-value"><?= $stat['total_claims'] ?></div>
                    <div class="stats-number-label">Total</div>
                  </div>
                  <div class="stats-number-item open">
                    <div class="stats-number-value"><?= $stat['open_claims'] ?></div>
                    <div class="stats-number-label">Open</div>
                  </div>
                  <div class="stats-number-item closed">
                    <div class="stats-number-value"><?= $stat['closed_claims'] ?></div>
                    <div class="stats-number-label">Closed</div>
                  </div>
                </div>

                <?php if ($stat['total_claims'] > 0): ?>
                  <div class="stats-bar">
                    <div class="stats-bar-open" style="width: <?= ($stat['open_claims'] / $stat['total_claims']) * 100 ?>%;"></div>
                    <div class="stats-bar-closed" style="width: <?= ($stat['closed_claims'] / $stat['total_claims']) * 100 ?>%;"></div>
                  </div>
                <?php endif; ?>

                <div style="text-align: center; margin-top: 15px;">
                  <a href="index.php?controller=AdminClaim&action=index&subject_id=<?= $stat['id'] ?>" class="btn">View Claims</a>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </section>
    </div>

    <!-- Added JavaScript for the Chart -->
    <?php if (!empty($subjectStats)): ?>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
                // Prepare data for the pie chart
                const subjectLabels = [<?php
                $labels = array_map(function ($stat) {
                  return "'" . addslashes($stat['subject_title']) . "'";
                }, $subjectStats);
                echo implode(', ', $labels);
                ?>];
              
                const subjectData = [<?php
                $data = array_map(function ($stat) {
                  return $stat['total_claims'];
                }, $subjectStats);
                echo implode(', ', $data);
                ?>];
              
                // Generate vibrant colors for each subject
                const backgroundColors = generateColors(subjectLabels.length);
              
                // Create the pie chart
                const ctx = document.getElementById('claimsDistributionChart').getContext('2d');
                new Chart(ctx, {
                  type: 'pie',
                  data: {
                    labels: subjectLabels,
                    datasets: [{
                      data: subjectData,
                      backgroundColor: backgroundColors,
                      borderWidth: 1,
                      hoverOffset: 15
                    }]
                  },
                  options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                      legend: {
                        position: 'right',
                        labels: {
                          boxWidth: 15,
                          padding: 15,
                          font: {
                            size: 12
                          }
                        }
                      },
                      tooltip: {
                        callbacks: {
                          label: function(context) {
                            const label = context.label || '';
                            const value = context.raw || 0;
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = Math.round((value / total) * 100);
                            return `${label}: ${value} claims (${percentage}%)`;
                          }
                        }
                      }
                    }
                  }
                });
              
                // Function to generate vibrant colors
                function generateColors(count) {
                  const colors = [];
                  const hueStep = 360 / count;
                
                  for (let i = 0; i < count; i++) {
                    const hue = i * hueStep;
                    colors.push(`hsl(${hue}, 70%, 60%)`);
                  }
                
                  return colors;
                }
              });
            </script>
          <?php endif; ?>
        </body>
      </html>