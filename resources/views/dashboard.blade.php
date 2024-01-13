<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<x-app-layout>
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="3000">
                <img src="photos/1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="photos/2.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
         </button>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden outline-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container col-xl-10 col-xxl-8 px-1 py-3">
                        <div class="row align-items-center g-lg-5 py-5">
                          <div class="col-lg-7 text-center text-lg-start">
                          <span class="border border-warning border border-5">
                            <h3 class="display-6 text-yellow-500 lh-2 mb-2">A Publication of the Mindanao State University - Naawan</h3>
                            <p class="col-lg-10 text-secondary fs-7">The <b class="text-blue-500">Journal of Environment and Aquatic Resources</b> is an open access peer-reviewed
                                multi-disciplinary journal produced annually by the Mindanao State University at Naawan devoted to the publication of research and development studies on the environment,
                                including the human components such as social sciences, humanities and education, and the natural resources. It features scientific papers and articles on the environment and ecological research; terrestrial and aquatic biodiversity; fisheries resource assessment; environmental, socio-economic and policy studies;
                                and development work in coastal resource management and environmental governance.</p>
                                </span>
                          </div>
                          <div class="col-md-10 mx-auto col-lg-5">
                              <img src="photos/wawaw.png" width="700">
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
