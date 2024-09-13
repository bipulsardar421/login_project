google.charts.load("current", { packages: ["corechart"] });
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  const dataBar = google.visualization.arrayToDataTable([
    ["Year", "Git Contribution"],
    [2001, 70],
    [2002, 80],
    [2003, 80],
    [2004, 90],
    [2005, 90],
    [2006, 90],
    [2007, 50],
    [2008, 60],
    [2009, 70],
    [2010, 60],
    [2011, 40],
  ]);
  const dataPie = google.visualization.arrayToDataTable([
    ["Year", "Git Contribution"],

    ["2007", 50],
    ["2008", 60],
    ["2009", 70],
    ["2010", 60],
    ["2011", 40],
  ]);
  const optionsBar = {
    title: "Performance review for last 10 years",
    hAxis: { title: "Years" },
    vAxis: { title: "Git Contribution" },
    legend: "none",
  };
  const optionsPie = {
    title: "Performance review for last 5 years",
  };
  const chart = new google.visualization.LineChart(
    document.getElementById("barChart")
  );
  const pie = new google.visualization.PieChart(
    document.getElementById("pieChart")
  );

  chart.draw(dataBar, optionsBar);
  pie.draw(dataPie, optionsPie);
}
