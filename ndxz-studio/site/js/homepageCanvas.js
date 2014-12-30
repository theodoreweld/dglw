        function loadImages(sources, callback){
            var images = {};
            var loadedImages = 0;
            var numImages = 0;
            for (var src in sources) {
                numImages++;
            }
            for (var src in sources) {
                images[src] = new Image();
                images[src].onload = function(){
                    if (++loadedImages >= numImages) {
                        callback(images);
                    }
                };
                images[src].src = sources[src];
            }
        }
 
        function addCornerHandles(shape){
            var stage = shape.getStage();
            var layer = shape.getLayer();
 
            shape.handles = [];
 
            for (var n = 0; n < 4; n++) {
                (function(){
                    var i = n;
                    var handle = new Kinetic.Shape(function(){
                        var context = this.getContext();
                        context.beginPath();
                        context.fillStyle = "red";
                        context.rect(0, 0, 10, 10);
                        context.fill();
                        context.closePath();
                    });
 
                    handle.img = shape;
                    handle._index = i;
                    shape.handles.push(handle);
 
                    handle.on("mousedown", function(evt){
                        handle.img.resizeCorner = handle;
                        shape.moveToTop();
                        positionCornerHandles(shape);
                    });
 
                    handle.on("mouseover", function(){
                        document.body.style.cursor = "pointer";
                    });
                    handle.on("mouseout", function(){
                        document.body.style.cursor = "default";
                    });
 
                    layer.add(handle);
                })();
            }
        }
 
        function positionCornerHandles(shape){
            handles = shape.handles;
            handles[0].x = shape.x - shape.width / 2;
            handles[0].y = shape.y - shape.height / 2;
 
            handles[1].x = shape.x + shape.width / 2 - 10;
            handles[1].y = shape.y - shape.height / 2;
 
            handles[2].x = shape.x + shape.width / 2 - 10;
            handles[2].y = shape.y + shape.height / 2 - 10;
 
            handles[3].x = shape.x - shape.width / 2;
            handles[3].y = shape.y + shape.height / 2 - 10;
 
            for (var n = 0; n < handles.length; n++) {
                handles[n].moveToTop();
            }
 
            shape.getLayer().draw();
        }
 
        function resizeImage(shape){
            var stage = shape.getStage();
            var mousePos = stage.getMousePosition();
            var newImageWidth, newImageHeight;
            var index = shape.resizeCorner._index;
 
            switch (index) {
                case 0:
                    newImageWidth = shape.x - mousePos.x + shape.width / 2;
                    newImageHeight = shape.y - mousePos.y + shape.height / 2;
                    break;
                case 1:
                    newImageWidth = mousePos.x - shape.x + shape.width / 2;
                    newImageHeight = shape.y - mousePos.y + shape.height / 2;
                    break;
                case 2:
                    newImageWidth = mousePos.x - shape.x + shape.width / 2;
                    newImageHeight = mousePos.y - shape.y + shape.height / 2;
                    break;
                case 3:
                    newImageWidth = shape.x - mousePos.x + shape.width / 2;
                    newImageHeight = mousePos.y - shape.y + shape.height / 2;
                    break;
            }
 
            shape.width = newImageWidth;
            shape.scale.x = newImageWidth / shape.origWidth;
            shape.height = newImageHeight;
            shape.scale.y = newImageHeight / shape.origHeight;
            positionCornerHandles(shape);
        }
 
        function initStage(images){
            var stage = new Kinetic.Stage("container", 578, 400);
            var layer = new Kinetic.Layer();
 
            // darth vader
            var darthVaderWidth = 200;
            var darthVaderHeight = 138;
            // use Image plugin
            var darthVaderImg = new Kinetic.Image({
                image: images.darthVader,
                x: -100,
                y: -69,
                width: darthVaderWidth,
                height: darthVaderHeight
            });
 
            darthVaderImg.draggable(true);
 
            darthVaderImg.on("mousedown", function(){
                this.moveToTop();
                positionCornerHandles(this);
            });
 
            darthVaderImg.width = darthVaderWidth;
            darthVaderImg.height = darthVaderHeight;
            darthVaderImg.origWidth = darthVaderWidth;
            darthVaderImg.origHeight = darthVaderHeight;
            darthVaderImg.x = 200;
            darthVaderImg.y = 100;
 
            layer.add(darthVaderImg);
 
 
            // yoda
            var yodaWidth = 92;
            var yodaHeight = 104;
            // use Image plugin
            var yodaImg = new Kinetic.Image({
                image: images.yoda,
                x: -46,
                y: -52,
                width: yodaWidth,
                height: yodaHeight
            });
 
            yodaImg.draggable(true);
 
            yodaImg.on("mousedown", function(){
                this.moveToTop();
                positionCornerHandles(this);
            });
 
            yodaImg.width = yodaWidth;
            yodaImg.height = yodaHeight;
            yodaImg.origWidth = yodaWidth;
            yodaImg.origHeight = yodaHeight;
            yodaImg.x = 400;
            yodaImg.y = 100;
 
            layer.add(yodaImg);
 
            stage.on("mouseup", function(){
                darthVaderImg.resizeCorner = undefined;
                yodaImg.resizeCorner = undefined;
            }, false);
 
            stage.on("mousemove", function(){
                if (stage.shapeDragging) {
                    positionCornerHandles(stage.shapeDragging);
                }
                else if (darthVaderImg.resizeCorner) {
                    resizeImage(darthVaderImg);
                }
                else if (yodaImg.resizeCorner) {
                    resizeImage(yodaImg);
                }
            }, false);
 
            stage.add(layer);
 
            // add handles
            addCornerHandles(darthVaderImg);
            addCornerHandles(yodaImg);
            positionCornerHandles(darthVaderImg);
            positionCornerHandles(yodaImg);
        }
 
        window.onload = function(){
            var sources = {
                darthVader: "dglw_logo_v1.jpg",
                yoda: "DGLW_LOGO_v3.jpg"
            };
            loadImages(sources, initStage);
        };