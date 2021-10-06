const { gsap } = require("gsap/dist/gsap");
const { ScrollTrigger } = require("gsap/dist/ScrollTrigger");

gsap.registerPlugin(ScrollTrigger);

// let timeLineHeader = ;
// gsap.set("#header-img", {xPercent: 0, yPercent: 0}),
gsap
  .timeline({})
  .to("#header-img", {
    scale: 3,
    scrollTrigger: {
      ease: "Circ.easeInOut",
      trigger: "#header-img",
      start: "top top",
      endTrigger: "#header-img",
      end: "bottom 17%",
      scrub: 3,
    },
  })
  .to("#img-scale", {
    y: 50,
    // x: 100,
    scrollTrigger: {
      ease: "Circ.easeInOut",
      trigger: "h1",
      start: "top 60%",
      endTrigger: "#down1",
      end: "top top",
      scrub: 3,
      toogleActions: "none none none none",
    },
  })
  .to("h1", {
    y: -100,
    scrollTrigger: {
      // markers: true,
      trigger: "h1",
      ease: "Circ.easeInOut",
      start: "top 35%",
      endTrigger: "#down1",
      end: "top 5%",
      scrub: 3,
      toogleActions: "none none none none",
    },
  });

  gsap.to(".main-image", {duration: 2.5, ease: "expo", x: -75});

// .to("#header-img" , {css : {position:'fixed', height: '15vh'},
// scrollTrigger: {
//     trigger: 'h1',
//     start: "top 12%",
//     end: "botton top",
//     markers: true,
//     // pin: true,
//     // scrub:true,
//     // toogleActions: "none none none none"
// },
// })
