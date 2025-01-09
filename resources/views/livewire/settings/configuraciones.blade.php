<div class="d-flex justify-content-center">
    <div class="card" style="min-width: 95%; min-height: 80vh">
        <div class="card-body">
            <div class="text-center">
                <h2>
                    Configuraciones
                </h2>
            </div>
            <div>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                <div class="d-flex align-items-center">
                                    @livewire(
                                        'Icongoogle.Icongoogle',
                                        [
                                            'nombre' => 'apartment',
                                            // 'color' => 'blue',
                                            'size' => 24,
                                        ],
                                        key('apartment')
                                    )
                                    Conf. Edificios
                                </div>
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body" style="padding: 10px 0 10px 0">
                                {{-- AQUI --}}
                                @livewire('Edificio.SettingsEdificios')
                            </div>
                        </div>
                    </div>
                    {{-- <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                aria-controls="flush-collapseTwo">
                                <div class="d-flex align-items-center">
                                    @livewire(
                                        'Icongoogle.Icongoogle',
                                        [
                                            'nombre' => 'inbox_customize',
                                            // 'color' => 'blue',
                                            'size' => 24,
                                        ],
                                        key('inbox_customize')
                                    )
                                    Conf. PDF
                                </div>
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to
                                demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion
                                body. Let's imagine this being filled with some actual content.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                <div class="d-flex align-items-center">
                                    @livewire(
                                        'Icongoogle.Icongoogle',
                                        [
                                            'nombre' => 'file_copy_off',
                                            // 'color' => 'blue',
                                            'size' => 24,
                                        ],
                                        key('file_copy_off')
                                    )
                                    Conf. Word
                                </div>
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to
                                demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion
                                body. Nothing more exciting happening here in terms of content, but just filling up the
                                space to make it look, at least at first glance, a bit more representative of how this
                                would look in a real-world application.</div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
