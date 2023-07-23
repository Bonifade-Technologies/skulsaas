export default defineAppConfig({
  docus: {
    title: 'School management System from Bonifade Technologies',
    description: 'Welcome to our cutting-edge School Management System! Streamline your educational institution with our user-friendly interface, empowering administrators, teachers, and parents to collaborate effortlessly. Manage students\' data, attendance, grades, and communication with ease.Enhance transparency and efficiency, ensuring smooth operations and fostering an ideal learning environment.Elevate your school\'s performance with our comprehensive solution tailored to meet all your educational needs.Join us and revolutionize the way your school operates!',
    image: 'https://user-images.githubusercontent.com/904724/185365452-87b7ca7b-6030-4813-a2db-5e65c785bf88.png',
    socials: {
      twitter: 'nuxt_js',
      github: 'nuxt-themes/docus',
      nuxt: {
        label: 'Nuxt',
        icon: 'simple-icons:nuxtdotjs',
        href: 'https://bowofade.com'
      }
    },
    github: {
      dir: '.starters/default/content',
      branch: 'main',
      repo: 'docus',
      owner: 'nuxt-themes',
      edit: true
    },
    aside: {
      level: 0,
      collapsed: false,
      exclude: []
    },
    main: {
      padded: true,
      fluid: true
    },
    header: {
      logo: true,
      showLinkIcon: true,
      exclude: [],
      fluid: true
    }
  }
})
