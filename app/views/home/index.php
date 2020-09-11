<?= $this->getJS(); ?>
<?= $this->getCSS();?>

<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light" id="firstCard">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
        <h2 style="font-family: 'Merienda One', cursive;" class="display-4 font-weight-normal">Organize!</h2>
        <p class="lead font-weight-normal">
            Our goal is to help you organize your day as best as possible!
        </p>
    </div>
</div>

<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
    <div class="mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden" id="secondCard">
        <div class="my-3 py-3">
            <h2 class="display-5">Simple to use interface.</h2>
            <p class="lead">We created simple to use interface so you can start doing your thing right now!
            </p>
        </div>
        <div class="bg-light shadow-sm mx-auto" style="margin-top: 50px; width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
            <button onclick="smoothScroll(document.getElementById('interfaceCont1'))" type="button" class="learnMore-btn-2">Learn more</button>
        </div>
    </div>
        <div class="mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden" id="thirdCard">
        <div class="my-3 p-3">
            <h2 class="display-5" style="color: rgb(201, 150, 150);">Fast.</h2>
            <p class="lead" style="color: rgb(201, 150, 150);">We spent number of hours working on extremly fast system.
                With this system we are proud to present you good looking solution to organize your day!
            </p>
        </div>
        <div class="shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0; background-color: rgb(201, 150, 150);">
            <button onclick="smoothScroll(document.getElementById('interfaceCont2'))" type="button" class="learnMore-btn-1" href="#interfaceCont1">Learn more</button>
        </div>
    </div>
</div>

<div class="container-fluid" id="hoverContainer">
    <div id="interfaceCont1" class="container-fluid">
        <div class="mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-white overflow-hidden" id="secondCard">
            <h2 style="font-family: 'Merienda One', cursive;">Simple to use interface!</h2>
            <p style="font-size: 20px">We spent a lot of time designing super user friendly interface that would fit anyone!
                We wanted to make you feel like you are using something that is stress free and that is
                very presenting for your needs!
            </p>
            <P style="font-size: 20px">We are proud to present you our solution and we invite you to try it!
                <strong>It's free!</strong>
            </P>
            <p style="font-size: 20px">Our interface was something that we proudly say we invested a lot of time into developing smooth and
                simple looking. We wanted to provide only the best for our users so they feel they don't have too much on their hands
                yet we didn't want them to give them limitations on something they would like to use in their needs!
            </p>
            <br>
        </div>
    </div>
</div>

<div class="container-fluid" id="hoverContainer2">
    <div id="interfaceCont2" class="container-fluid">
        <div class="mr-md-3 pt-3 px-3 pt-md-5 px-md-5 overflow-hidden" id="thirdCard" style="color:rgb(201, 150, 150);">
            <h2 style="font-family: 'Merienda One', cursive;">Fast.</h2>
            <p style="font-size: 20px">
            Trough the research we invested a lot of time and resources to find the best possible system and solution for your day.
            We tried to make the most fastest solution available on the market, we wanted for our users to have sense of that our solution is pretty fast. 
            Although we are continuously working on making this application even more faster we can proudly say that our solution is reliable and good for making your day less of a pain. By dividing to do lists into categories and making you organize your tasks into little groups we already did half of your job. 
            We stand proud behind our solution and we want to offer best practices for your day, job, what in the world you need to accomplish in your day!
            </p>
            <br>
        </div>
    </div>
</div>