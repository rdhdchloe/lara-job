<div x-data="imagePreview()">
    <input @change="showPreview(event)" type="file" id="image" name="image" class="mt-1">
    <img src="{{ isset(Auth::user()->image) ? Auth::user()->image : asset('images/no-image.png') }}" alt="" class="w-9 h-9 mt-3 rounded-md object-cover" id="preview">

    <script>
        function imagePreview(){
            return {
                showPreview: (event) => {
                    if (event.target.files.length > 0){
                        var src = URL.createObjectURL(event.target.files[0]);
                        document.getElementById('preview').src = src;
                    }
                }
            }
        }
    </script>
</div>
