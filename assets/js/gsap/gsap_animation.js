var tl =  gsap.timeline();

tl.from(".header .navbar-brand",{
    y:-40,
    opacity:0,
    delay:2,
})

gsap.from(".home_1 .text",{
    y:100,
    delay:2.5,
    opacity:0,
    duration:0.6,
})

tl.from( ".home_1 .home_head p",{
    y:100,
    opacity:0,
    // delay:4,
    duration:0.5,
})
tl.from( ".home_1 .home_desceription",{
    y:100,
    opacity:0,
    duration:0.8,
    stagger:1,

})
// gsap.from(".home_2 .home_2_top .video_container",{
//     opacity:0,
//     scale:0,
//     duration:0.8,
//     scrollTrigger:{
//         trigger:".home_2 " ,
//         start:"1% 70%",
//         end: "15% 50%",
//         // markers:true,
//         scrub:3,
//     }
// })
gsap.from(".home_2 .home_2_top .text_1",{
    y:100,
    opacity:0,
    duration:0.8,
    scrollTrigger:{
        trigger:".home_2 .home_2_top",
        start:"30% 60%",
        end: "40% 50%",
        // markers:true,
        scrub:3,
    }
})
gsap.from(".home_2 .home_2_top .text_2",{
    y:100,
    opacity:0,
    duration:0.8,
    scrollTrigger:{
        trigger:".home_2 .home_2_top ",
        start:"40% 60%",
        end: "50% 50%",
        // markers:true,
        scrub:3,
    }
})
// gsap.from(".home_2 .home_2_bottom .home_2_bottom_top",{
//     y:100,
//     opacity:0,
//     duration:0.8,
//     stagger:1,
//     scrollTrigger:{
//         trigger:".home_2 .home_2_bottom ",
//         start:"1% 90%",
//         end: "10% 70%",
//         markers:true,
//         scrub:3,
//     }
// })
