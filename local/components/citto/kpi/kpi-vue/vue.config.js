console.log(process.env.NODE_ENV)

if (process.env.NODE_ENV === 'production') {
  module.exports =
    {
      assetsDir: '../../../../../../local/components/citto/kpi/templates/kpi-start-template',
      indexPath: 'template.php',
      outputDir: '../templates/kpi-start-template',
      publicPath: '/kpi'
    };
}

