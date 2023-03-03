var slide_podcast = new Swiper(".slide-podcast", {
  slidesPerView: 4,
  spaceBetween: 32,
  pagination: {
    el: ".s-podcast .top .swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".s-podcast .top .btn-next",
    prevEl: ".s-podcast .top .btn-prev",
  },
  speed: 600,
  breakpoints: {
    320: {
      slidesPerView: 1.1,
      spaceBetween: 20,
    },
    500: {
      slidesPerView: 1.5,
    },
    768: {
      slidesPerView: 2.1,
    },
    991: {
      slidesPerView: 2.5,
    },
    1100: {
      slidesPerView: 3.5,
      spaceBetween: 32,
    },
    1200: {
      slidesPerView: 4,
      spaceBetween: 32,
    },
  },
});

const btnScrollTop = document.getElementById("js-btn-scroll-top");

btnScrollTop.addEventListener("click", () => {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
});

const btnMobile = document.getElementById("js-btn-mobile");

btnMobile.addEventListener("click", () => {
  btnMobile.classList.toggle("is-active");
  document.documentElement.classList.toggle("menu-opened");
});

const listTopics = document.querySelector(".js-topics");
const topics = document.querySelectorAll(".s-detalhes-post .featured-info-post .info-post-geral .right-content .content-post h2");

if (listTopics) {
  topics.forEach((topic) => {
    let listElement = document.createElement("li");
    listTopics.appendChild(listElement);

    let ancorTopic = document.createElement("a");
    ancorTopic.setAttribute("href", "#");
    listElement.appendChild(ancorTopic);

    let titleAncor = document.createElement("span");
    ancorTopic.appendChild(titleAncor);
    titleAncor.textContent = topic.textContent;
  });
}

const allTopics = document.querySelectorAll(".js-topics li a");

allTopics[0].classList.add("active");

function offset(el) {
  if (document) {
    const rect = el.getBoundingClientRect();
    const scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    return { top: rect.top + scrollTop, left: rect.left + scrollLeft };
  }
}

function handleScrollTop(position) {
  if (document) {
    const topics = document.querySelectorAll(".s-detalhes-post .featured-info-post .info-post-geral .right-content .content-post h2")[position];

    window.scroll({
      behavior: "smooth",
      left: 0,
      top: offset(topics).top - 110,
    });
  }
}

// Mapeando e fazer o evento de clique nos topics para dar o scroll conforme o layout
allTopics.forEach((item, index) => {
  item.addEventListener("click", (event) => {
    event.preventDefault();

    allTopics.forEach((all) => {
      all.classList.remove("active");
    });

    item.classList.add("active");

    handleScrollTop(index);
  });
});
