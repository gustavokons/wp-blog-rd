module.exports = function() {
  var src = 'src';
  var dist = 'dist/wp-content/themes/resultados_digitais';

  var staging_env = [
    {
      'name': 'staging',
      'url': 'git@github.com:gustavokons/wp-theme.git'
    }
  ];

  var production_env = [
    {
      'name': 'production',
      'url': 'git@github.com:gustavokons/wp-theme.git'
    }
  ];

  var config = {
    src: src,
    dist: dist,
    staging_env: staging_env,
    production_env: production_env,
    theme_files: [
      src + '/*.php',
      src + '/*.png',
      src + '/*.css',
      src + '/img/**/*',
      src + '/inc/**/*',
      src + '/languages/**/*',
      src + '/page-templates/**/*',
      src + '/partials/**/*'
    ]
  };

  return config;
};
