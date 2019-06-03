const documentColorChanger = document.createElement('div');
const colorSlider = document.createElement('div');
const colorHandle = document.createElement('div');
const canvasHolder = document.getElementById('single_item');
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75, parseInt(canvasHolder.style.width) / parseInt(canvasHolder.style.height), 0.1, 1000);
scene.background = new THREE.Color(0xffffff); // Sets background color to white
const event = new EventDispatcher();
let mtl;
// Initial canvas maker
const renderer = new THREE.WebGLRenderer();
renderer.setSize(parseInt(canvasHolder.style.width)-100, parseInt(canvasHolder.style.height)-100);
canvasHolder.appendChild(renderer.domElement);

// cube maker
const geometry = new THREE.BoxGeometry(1, 1, 1);
const material = new THREE.MeshBasicMaterial({ color: 0x00ff00 });
const cube = new THREE.Mesh(geometry, material);
// scene.add(cube);

camera.position.z = 7;

// giving light to the canvas
const ambientLight = new THREE.AmbientLight(0xffffff, 1.0);
scene.add(ambientLight);

// const pointLight = new THREE.PointLight(0xffffff, 1);
// camera.add(pointLight);
scene.add(camera);

const hemisphereLight = new THREE.HemisphereLight(0xffffbb, 0x080820, 1);
scene.add(hemisphereLight);

// MTLLoader
// OBJLoader
const mtlLoader = new THREE.MTLLoader();
mtlLoader
  .setPath('assets/')
  .load(
    'helmet.mtl',
    function (materials) {
      materials.preload();
      console.log('material-for-helmet', materials);
      mtl = materials; // remove this piece this is some daring shit
      // OBJLoader
      const loader = new THREE.OBJLoader();
      loader
        .setMaterials(materials)
        .load(
          'assets/helmet.obj',
          function (obj) {
            // Positioning the object
            obj.position.y = -2.4;
            obj.rotation.y = -15;
            // Object.assign(obj.prototype, EventDispatcher.prototype); - not worked
            // OrbitControls.js looks promising
            // Somehow understood how to get individual object from the whole
            // Changing colors is usually the power of Material
            console.log('helmet-obj', obj);
            // obj.children[2].position.x = -0.39;
            scene.add(obj);
          },
          function (xhr) {
            console.log(Math.round(((xhr.loaded / xhr.total * 100)), 2) + '% loaded');
          },
          function (error) {
            console.log('An error happened');
          }
        );
    }
  );

function animate() {
  requestAnimationFrame(animate);

  // cube.rotation.x += 0.01;
  // cube.rotation.y += 0.01;
  // camera.lookAt(scene.position);
  renderer.render(scene, camera);
}

animate();

// Color picker
colorSlider.classList.add('slider');
colorHandle.classList.add('handle');
colorSlider.classList.add('floating');

canvasHolder.appendChild(colorSlider);
colorSlider.appendChild(colorHandle);
$(".handle").mousedown(function() {
  $(this).addClass("pop");
  $(this).parent(".slider").addClass("grad");
});
$(".handle").mouseup(function() {
  $(this).removeClass("pop");
  $(this).parent(".slider").removeClass("grad");
});
  
try{

  $( ".handle" ).draggable({ 
    axis: "x",
    containment: "parent",
    drag: function( event, ui ) {
      var thisOffset = $(this).position().left;
      var angle = (thisOffset/300)*360;
      var hslcolor = "hsl("+ angle + ", 100%, 50%)";
      $(this).css("background-color", hslcolor);
      const colorHelmet = new THREE.Color(hslcolor);
      const helmetHSL = colorHelmet.getHSL();
      mtl.materials.Helmet.color = colorHelmet;
      
      $(this).parent(".slider").css("background-color", hslcolor)
    },
    /*start: function( event, ui ) {
      $(this).addClass("pop");
      $(this).parent(".slider").addClass("grad");
    },*/
    stop: function( event, ui ) {
      $(this).removeClass("pop");
      $(this).parent(".slider").removeClass("grad");
    }
  });
}
catch(e)
{

}