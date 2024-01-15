<div>
        <form wire:submit.prevent="updateDepartment">
            <div class="form-group">
                <input wire:model.defer="libelle" type="text" class="form-control mb-3" id="libelle"
                    placeholder="Entrez le libellé du département">
                @error('libelle')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
</div>
