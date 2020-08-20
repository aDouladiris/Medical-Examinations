$("#wizard").steps({
    headerTag: "h1",
    bodyTag: "fieldset",
    transitionEffect: "slideLeft",
    stepsOrientation: "vertical",
    labels: {
        previous : 'Previous',
        next : 'Next',
        finish : 'Submit',
        current : ''
    },
    titleTemplate : '<div class="title"><span class="title-text">#title#</span><span class="title-number">0#index#</span></div>',
    onFinished: function (event, currentIndex)
    {
        alert('Sumited');
    }
});

