/* common.ts */
export let InfoMessage = null;

interface InfoMessageProps {
    text: string;
}

ymaps3.ready.then(() => {
    // Регистрируем CDN (как у тебя было)
    ymaps3.import.registerCdn('https://cdn.jsdelivr.net/npm/{package}', '@yandex/ymaps3-default-ui-theme@0.0');

    class InfoMessageClass extends ymaps3.YMapComplexEntity<InfoMessageProps> {
        private _element!: HTMLDivElement;
        private _detachDom!: () => void;

        _createElement(props: InfoMessageProps) {
            const infoWindow = document.createElement('div');
            infoWindow.classList.add('info_window');
            // наполняем стартовым текстом (может быть HTML)
            infoWindow.innerHTML = props && props.text ? props.text : '';
            return infoWindow;
        }

        _onAttach() {
            this._element = this._createElement(this._props);
            this._detachDom = ymaps3.useDomContext(this, this._element, this._element);
        }

        _onDetach() {
            this._detachDom?.();
            this._detachDom = undefined;
            this._element = undefined;
        }

        // Обновляет содержимое через строку (HTML)
        update(props: InfoMessageProps) {
            this._props = props;
            if (this._element) {
                this._element.innerHTML = props && props.text ? props.text : '';
            }
        }

        // Вставляет DOM-элемент внутрь контролла (и очищает предыдущее)
        updateContent(element: HTMLElement) {
            if (this._element) {
                this._element.innerHTML = '';
                this._element.appendChild(element);
            }
        }
    }

    InfoMessage = InfoMessageClass;
});
