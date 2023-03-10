@props(['order'])

<div x-data="{
    name: '',
    uploading: false,
    url: '{{ $order->proof_url }}',
    progress: 0,
    get message() {
        return (this.progress < 100) ? `Uploading: ${this.progress}%` : 'Image is being processed'
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
                formData.append('image', file);
                this.name = file ? file.name : ''
                const { data } = await window.axios.post('{{ route('orders.update.proof', $order->id) }}', formData, { onUploadProgress });
                this.url = data.proof_url
                window.fire.success('Proof has updated')
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
  <img x-show="url" x-bind:src="url" class="d-block w-100 mb-3" />
  <div class="c-form-upload">
    <p class="px-3 py-5 text-center border rounded" x-text="uploading ? message : 'Click here to update proof image'"></p>
    <input x-bind:disabled="uploading" type="file" aria-hidden="true" accept="image/*" x-on:change="onChange" />
  </div>
</div>
