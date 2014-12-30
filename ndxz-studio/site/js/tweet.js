new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 1,
  interval: 30000,
  width: 180,
  height: 100,
  theme: {
    shell: {
      background: '#333333',
      color: '#ffffff'
    },
    tweets: {
      background: '#999',
      color: '#ffffff',
      links: '#000099',
    }
  },
  features: {
    scrollbar: false,
    loop: false,
    live: false,
    behavior: 'all'
  }
}).render().setUser('theodore_weld').start();