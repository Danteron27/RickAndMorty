import _ from 'lodash'
import 'bootstrap';
import axios from 'axios';
import swal from 'sweetalert2';

window._ = _
window.swal = swal
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

