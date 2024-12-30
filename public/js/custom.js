; (function () {
  'use strict'

  // Axios laravel
  axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector(
    'meta[name=csrf-token]'
  ).content
  axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

  /* page loader */
  function hideLoader() {
    const loader = document.getElementById('loader')
    loader.classList.add('d-none')
  }
  window.addEventListener('load', hideLoader)
  /* page loader */

  /* tooltip */
  const tooltipTriggerList = document.querySelectorAll(
    '[data-bs-toggle="tooltip"]'
  )
  const tooltipList = [...tooltipTriggerList].map(
    tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl)
  )

  $('.select2-ns').select2({
    minimumResultsForSearch: Infinity,
    placeholder: '- Pilih -',
    allowClear: true
  })

  $('.select2').select2({
    placeholder: '- Pilih -'
  })

  $('.select2-modal').select2({
    placeholder: '- Pilih -',
    dropdownParent: $('.modal .modal-content')
  })

  $('.select2-ns-modal').select2({
    minimumResultsForSearch: Infinity,
    placeholder: '- Pilih -',
    allowClear: true,
    dropdownParent: $('.modal .modal-content')
  })

  /* header theme toggle */
  function toggleTheme() {
    let html = document.querySelector('html')
    if (html.getAttribute('data-theme-mode') === 'dark') {
      html.setAttribute('data-theme-mode', 'light')
      html.setAttribute('data-header-styles', 'light')
      html.setAttribute('data-menu-styles', 'light')
      if (!localStorage.getItem('primaryRGB')) {
        html.setAttribute('style', '')
      }
      html.removeAttribute('data-bg-theme')
      html.style.removeProperty('--light-rgb')
      html.style.removeProperty('--form-control-bg')
      html.style.removeProperty('--input-border')
      localStorage.removeItem('valexdarktheme')
      localStorage.removeItem('valexMenu')
      localStorage.removeItem('valexHeader')
      localStorage.removeItem('bodylightRGB')
      localStorage.removeItem('bodyBgRGB')
      if (localStorage.getItem('valexlayout') != 'horizontal') {
        html.setAttribute('data-menu-styles', 'light  ')
      }
      html.setAttribute('data-header-styles', 'light')
    } else {
      html.setAttribute('data-theme-mode', 'dark')
      html.setAttribute('data-header-styles', 'dark')
      if (!localStorage.getItem('primaryRGB')) {
        html.setAttribute('style', '')
      }
      html.setAttribute('data-menu-styles', 'dark')
      localStorage.setItem('valexdarktheme', 'true')
      localStorage.setItem('valexMenu', 'dark')
      localStorage.setItem('valexHeader', 'dark')
      localStorage.removeItem('bodylightRGB')
      localStorage.removeItem('bodyBgRGB')
    }
  }
  let layoutSetting = document.querySelector('.layout-setting')
  layoutSetting.addEventListener('click', toggleTheme)
  /* header theme toggle */

  /* card with close button */
  let DIV_CARD = '.card'
  let cardRemoveBtn = document.querySelectorAll(
    '[data-bs-toggle="card-remove"]'
  )
  cardRemoveBtn.forEach(ele => {
    ele.addEventListener('click', function (e) {
      e.preventDefault()
      let $this = this
      let card = $this.closest(DIV_CARD)
      card.remove()
      return false
    })
  })
  /* card with close button */

  /* card with fullscreen */
  let cardFullscreenBtn = document.querySelectorAll(
    '[data-bs-toggle="card-fullscreen"]'
  )
  cardFullscreenBtn.forEach(ele => {
    ele.addEventListener('click', function (e) {
      let $this = this
      let card = $this.closest(DIV_CARD)
      card.classList.toggle('card-fullscreen')
      card.classList.remove('card-collapsed')
      e.preventDefault()
      return false
    })
  })
  /* card with fullscreen */
  /* back to top */
  const scrollToTop = document.querySelector('.scrollToTop')
  const $rootElement = document.documentElement
  const $body = document.body
  window.onscroll = () => {
    const scrollTop = window.scrollY || window.pageYOffset
    const clientHt = $rootElement.scrollHeight - $rootElement.clientHeight
    if (window.scrollY > 100) {
      scrollToTop.style.display = 'flex'
    } else {
      scrollToTop.style.display = 'none'
    }
  }
  scrollToTop.onclick = () => {
    window.scrollTo(0, 0)
  }
  /* back to top */

  // Moment jS Date
  moment.locale('id')
})()

/* full screen */
var elem = document.documentElement
function openFullscreen() {
  let open = document.querySelector('.full-screen-open')
  let close = document.querySelector('.full-screen-close')

  if (
    !document.fullscreenElement &&
    !document.webkitFullscreenElement &&
    !document.msFullscreenElement
  ) {
    if (elem.requestFullscreen) {
      elem.requestFullscreen()
    } else if (elem.webkitRequestFullscreen) {
      /* Safari */
      elem.webkitRequestFullscreen()
    } else if (elem.msRequestFullscreen) {
      /* IE11 */
      elem.msRequestFullscreen()
    }
    close.classList.add('d-block')
    close.classList.remove('d-none')
    open.classList.add('d-none')
  } else {
    if (document.exitFullscreen) {
      document.exitFullscreen()
    } else if (document.webkitExitFullscreen) {
      /* Safari */
      document.webkitExitFullscreen()
      console.log('working')
    } else if (document.msExitFullscreen) {
      /* IE11 */
      document.msExitFullscreen()
    }
    close.classList.remove('d-block')
    open.classList.remove('d-none')
    close.classList.add('d-none')
    open.classList.add('d-block')
  }
}
/* full screen */