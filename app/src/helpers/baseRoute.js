import _ from "lodash";

export default (name, path = '/views/pages') => {
    return {
        path: `/${_.snakeCase(name)}`,
        name: `${_.startCase(name)}`,
        component: import(`${path}/${name}/Index.vue`),
    }
}