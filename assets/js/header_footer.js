// Header
class Header extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
      <div id="nav" class="sticky-nav">
        <nav class="navbar navbar-expand-lg">
          <div class="container-fluid my-4 px-0">

            <!-- Logo -->
            <div class="col-md-3">
              <a class="navbar-brand" href="#"><img class="logo" src="assets/images/pixel_profile.png" alt=""></a>
            </div>

            <!-- Hamburger menu -->
            <div class="navbar-menu">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span></span>
                <span></span>
              </button>
            </div>

            <!-- Menu items -->
            <div class="collapse navbar-collapse col-md-9" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="#projects">Work</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#contact">Contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link resume-button" id="resume-link" href="#contact">Resume</a>
                </li>
              </ul>
            </div>

          </div>
        </nav>
      </div>
        `
  }
}


// Footer
class Footer extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
      <footer>
        <section id="footer">
          <div class="row">
            <div class="col-12 footer-col">
              <p><span class="copyright">Handmade by me &#169; 2021</span></p>
              <p>Built with&nbsp;&nbsp;<i class="fab fa-bootstrap"></i><span>&nbsp;Bootstrap</span></p>
            </div>
          </div>
        </section>
      </footer>
    `
  }
}

customElements.define('main-header', Header);
customElements.define('main-footer', Footer);
