@props(['product'])

<div x-data="{
    name: '',
    uploading: false,
    url: '{{ $product->video_url }}',
    progress: 0,
    get message() {
        return (this.progress < 100) ? `Uploading: ${this.progress}%` : 'Video is being processed'
    },
    async onChange(e) {
        this.uploading = true
        const onUploadProgress = (e) => {
            this.progress = Math.round((e.loaded * 100) / e.total);
        }
        try {
            const [file] = e.target.files
            if (file) {
                const formData = new FormData();
                formData.append('video', file);
                this.name = file ? file.name : ''
                const { data } = await window.axios.post('{{ route('admin.products.update.video', $product->id) }}', formData, { onUploadProgress });
                this.url = data.video_url
                window.fire.success('Video has updated')
            }
        } catch (err) {
            window.fire.error(err.response?.data.message || err.message)
        }
        this.uploading = false
    },
    onComplete() {
        this.name = ''
        this.uploading = false
        this.progress = 0
    }
}">
  <video x-show="url" x-bind:src="url" class="w-100 mb-3" controls></video>
  <div class="c-form-upload">
    <p class="px-3 py-5 text-center border rounded" x-text="uploading ? message : 'Click here to update product video'"></p>
    <input x-bind:disabled="uploading" type="file" aria-hidden="true" accept="video/*" x-on:change="onChange" />
  </div>
</div>
