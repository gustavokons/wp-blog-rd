module.exports = function() {
  var src = 'src';
  var dist = 'dist';
  var dist_wp = 'dist/wp-content/themes/resultados_digitais';

  var staging_env = [
    {
      'url': 'git@git.wpengine.com:production/testsblog.git'
    }
  ];

  var production_env = [
    {
      'url': 'git@git.wpengine.com:production/testsblog.git'
    }
  ];

  var config = {
    src: src,
    dist: dist,
    dist_wp: dist_wp,
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
